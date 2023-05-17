<?php

use App\Models\AirlinesInfo;
use App\Models\AirlinesPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Helper
{

    public static function queryPageStr($qpArr)
    {
        //link for same page after query
        $qpStr = '';
        if (!empty($qpArr)) {
            $qpStr .= '?';
            foreach ($qpArr as $key => $value) {
                if ($value != '') {
                    $qpStr .= $key . '=' . $value . '&';
                }
            }
            $qpStr = trim($qpStr, '&');
            return $qpStr;
        }
    }

    public static function formatDate($dateTime = '0000-00-00 00:00:00')
    {
        $formatDate = !empty($dateTime) ? date('d F Y', strtotime($dateTime)) : '';
        return $formatDate;
    }

    public static function formatDateShortMonth($dateTime = '0000-00-00 00:00:00')
    {
        $formatDate = !empty($dateTime) ? date('d M Y', strtotime($dateTime)) : '';
        return $formatDate;
    }

    //put your code here
    public static function numberFormat($num = 0)
    {
        return number_format($num, 2, '.', ',');
    }

    public static function printDate($date = '0000-00-00')
    {

        return date('F jS, Y', strtotime($date));
    }

    public static function numberFormatDigit2($num = 0)
    {
        if (empty($num)) {
            $num = 0;
        }
        return number_format($num, 2, '.', '');
    }

    public static function numberFormat2Digit($num = 0)
    {
        if (empty($num)) {
            $num = 0;
        }
        return number_format($num, 2, '.', ',');
    }

    public static function printDateTime($dateTime = '0000-00-00 00:00:00')
    {

        return date('F jS, Y h:i A', strtotime($dateTime));
    }

    public static function formatDateTimeForPost($dateTime = '0000-00-00 00:00:00')
    {

        return date('  h:i A, j F  Y', strtotime($dateTime));
    }

    public static function dateTimeFormat($dateTime = '0000-00-00 00:00:00')
    {

        return date('j F Y h:i A', strtotime($dateTime));
    }


    public static function positionFormat($number = 0)
    {
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
        if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
            return $number . '<sup>th</sup>';
        } else {
            return $number . '<sup>' . $ends[$number % 10] . '</sup>';
        }
    }



    public static function dateFormatConvert($date = '0000-00-00')
    {
        return date('Y-m-d', strtotime($date));
    }

    public static function getOrderList($model = null, $operation = null, $parentId = null, $parentName = null)
    {

        /*
         * Operation :: 1 = Create, 2= Edit
         */
        $namespacedModel = '\\App\\Models\\' . $model;
        $targetArr = $namespacedModel::select(array(DB::raw('COUNT(id) as total')));

        if (!empty($parentId)) {
            $targetArr = $targetArr->where($parentName, $parentId);
        }
        $targetArr = $targetArr->first();
        $count = $targetArr->total;

        //in case of Create, always Increment the number of element in order
        //to accomodate new Data
        if ($operation == '1') {
            $count++;
        }
        return array_combine(range(1, $count), range(1, $count));
    }

    public static function getLastOrder($model = null, $operation = null, $parentId = null, $parentName = null)
    {

        /*
         * Operation :: 1 = Create, 2= Edit
         */
        $namespacedModel = '\\App\\Models\\' . $model;
        $targetArr = $namespacedModel::select(array(DB::raw('COUNT(id) as total')));
        if (!empty($parentId)) {
            $targetArr = $targetArr->where($parentName, $parentId);
        }
        $targetArr = $targetArr->first();

        $count = $targetArr->total;

        //in case of Create, always Increment the number of element in order
        //to accomodate new Data
        if ($operation == '1') {
            $count++;
        }

        return $count;
    }

    //function for Insert order
    public static function insertOrder($model = null, $order = null, $id = null, $parentId = null, $parentName = null)
    {
        $namespacedModel = '\\App\\Models\\' . $model;
        $namespacedModel::where('id', $id)->update(['order' => $order]);
        $target = $namespacedModel::where('id', '!=', $id)->where('order', '>=', $order);
        if (!empty($parentId)) {
            $target = $target->where($parentName, $parentId);
        }
        $target = $target->update(['order' => DB::raw('`order`+ 1')]);
    }



    // function for Update Order
    public static function updateOrder($model = null, $newOrder = null, $id = null, $presentOrder = null, $parentId = null, $parentName = null)
    {
        $namespacedModel = '\\App\\Models\\' . $model;
        $namespacedModel::where('id', $id)->update(['order' => $newOrder]);

        //condition for order range
        $target = $namespacedModel::where('id', '!=', $id);
        if (!empty($parentId)) {
            $target = $target->where($parentName, $parentId);
        }

        if ($presentOrder < $newOrder) {
            //$namespacedModel::where('id', '!=', $id)->where('order', '>=', $presentOrder)->where('order', '<=', $newOrder)->update(['order' => DB::raw('`order`- 1')]);
            $target = $target->where('order', '>=', $presentOrder)->where('order', '<=', $newOrder)->update(['order' => DB::raw('`order`- 1')]);
        } else {
            $target = $target->where('order', '>=', $newOrder)->where('order', '<=', $presentOrder)->update(['order' => DB::raw('`order`+ 1')]);
        }
    }

    public static function deleteOrder($model = null, $order = null, $parentId = null, $parentName = null)
    {
        $namespacedModel = '\\App\\Models\\' . $model;
        $target = $namespacedModel::where('order', '>=', $order);
        if (!empty($parentId)) {
            $target = $target->where($parentName, $parentId);
        }

        $target = $target->update(['order' => DB::raw('`order`- 1')]);
    }



    public static function limitTextWords($content = false, $limit = false, $url = false)
    {
        $stripTags = true;
        $ellipsis = true;
        if ($content && $limit) {
            $content = ($stripTags ? strip_tags($content) : $content);
            $content = explode(' ', $content, $limit + 1);
            if ($limit > sizeof($content)) {
                $ellipsis = false;
            }
            if ($ellipsis) {
                array_pop($content);
                if ($url) {
                    $url = $url;
                } else {
                    $url = '#';
                }
                array_push($content, '<span class="rm">...<a type="button" href="' . $url . '" class="welcome-read-more">'.__('english.READ_MORE_SMALL').'</a></span>');
            }
            $content = implode(' ', $content);
        }
        return $content;
    }

    public static function limitTextWordsExperimental($content = false, $limit = false)
    {
        $stripTags = true;
        $ellipsis = true;
        if ($content && $limit) {
            $content = ($stripTags ? strip_tags($content) : $content);
            $content = explode(' ', $content, $limit + 1);
            if ($limit > sizeof($content)) {
                $ellipsis = false;
            }
            if ($ellipsis) {
                array_pop($content);
            }
            $content = implode(' ', $content);
            rtrim($content);
            $content = $content . '<span class="rm">...</span>';
        }
        return $content;
    }


    public static function limitTextCharsWithURL($content = false, $limit = false, $url = false)
    {
        $stripTags = true;
        $ellipsis = true;
        if ($content && $limit) {
            if ($url) {
                $url = $url;
            } else {
                $url = '#';
            }
            $content  = ($stripTags ? strip_tags($content) : $content);
            $contentLength = strlen($content);
            $ellipsis = ($contentLength > $limit ? '<a href="' . $url . '">'.__('english.READ_MORE').'</a>' : '');
            $content  = mb_strimwidth($content, 0, $limit, "...");
            $content = $content . $ellipsis;
        }
        return $content;
    }

    public static function limitTextChars($content = false, $limit = false)
    {
        $stripTags = true;

        if ($content && $limit) {
            $content  = ($stripTags ? strip_tags($content) : $content);
            $contentLength = strlen($content);

            $content  = mb_strimwidth($content, 0, $limit, "...");
        }
        return $content;
    }


    public static function nextPost($table, $order)
    {
        $next = DB::table($table)->where('order', '>', $order)->where('status', 1)->orderBy('order', 'ASC')->first();

        return $next;
    }

    public static function prevPost($table, $order)
    {
        $next = DB::table($table)->where('order', '<', $order)->where('status', 1)->orderBy('order', 'DESC')->first();

        return $next;
    }

    public static function salaryTypes()
    {
        $salary_types = [
            '1' => 'Per Month',
            '2' => 'Per Day',
            '3' => 'Per Year'
        ];
        return $salary_types;
    }
    public static function trimString($string)
    {
        $stripTags = true;
        $content = ($stripTags ? strip_tags($string) : $string);
        $dot = strlen($content) > 20 ? '...' : '';
        $returnString = mb_strimwidth($content, 0, 20) . $dot;
        return $returnString;
    }

    public static function statusList()
    {
        return ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')];
    }

    public static function downloadFile(Request $request)
    {


        $fileName = $request->attachment;
        $fileOriginalName = $request->attachment_original;

        $filePath = 'public/uploads/notice/banner/file/' . $fileName;
        clearstatcache();

        $header = [
            'Content-Description: File Transfer',
            'Content-Type: application/force-download',
            'Content-Disposition: attachment; filename=' . $fileName,
            'Content-Length: ' . filesize($filePath),
        ];

        return Response::download($filePath, $fileOriginalName, $header);
    }


    public static function numberToOrdinal($number = null)
    {
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
        if (!empty($number)) {
            if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
                return $number . 'th';
            } else {
                return $number . $ends[$number % 10];
            }
        } else {
            return '';
        }
    }

    public static function colors($code = null)
    {
        $colors = [
            '1' => 'maroon',
            '2' => 'purple',
            '3' => 'red',
            '4' => 'fuchsia',
            '5' => 'greenC',
            '6' => 'olive',
            '7' => 'lime',
            '8' => 'navy',
            '9' => 'teal',
            '10' => 'aqua',
            '11' => 'brown	',
            '12' => 'cornflowerblue',
            '13' => 'maroon',
            '14' => 'purple',
            '15' => 'red',
            '16' => 'fuchsia',
            '17' => 'greenC',
            '18' => 'olive',
            '19' => 'lime',
            '20' => 'navy',
            '21' => 'teal',
            '22' => 'aqua',
            '23' => 'brown	',
            '24' => 'cornflowerblue',
            '25' => 'maroon',
            '26' => 'purple',
            '27' => 'red',
            '28' => 'fuchsia',
            '29' => 'greenC',
            '30' => 'olive',
            '31' => 'lime',
            '32' => 'navy',
            '33' => 'teal',
            '34' => 'aqua',
            '35' => 'brown	',
            '36' => 'cornflowerblue',
            '37' => 'maroon',
            '38' => 'purple',
            '39' => 'red',
            '40' => 'fuchsia',
            '41' => 'greenC',
            '42' => 'olive',
            '43' => 'lime',
            '44' => 'navy',
            '45' => 'teal',
            '46' => 'aqua',
            '47' => 'brown	',
            '48' => 'cornflowerblue',
            '49' => 'greenC',
            '50' => 'olive',
            '51' => 'lime',
            '52' => 'navy',
            '53' => 'teal',
            '54' => 'aqua',
            '55' => 'brown	',
            '56' => 'cornflowerblue',
            '57' => 'maroon',
            '58' => 'purple',
            '59' => 'red',
            '60' => 'fuchsia',
        ];
        return $colors[$code];
    }

    // Api info start


    //send data to other site function start
    public static function sendHttpPost(Request $request, $url)
    {
        $clientHeader = Self::getApiHeader();
        $clientUrl = !empty($clientHeader['client_url']) ? $clientHeader['client_url'] : '';

        $response = Http::post($clientUrl . '/api/' . $url, [
            'header' => $clientHeader,
            'data' => $request->toArray(),
        ]);

        // echo '<pre>';
        // dd($clientUrl);
        return json_decode($response->body(), true);
    }
    public static function getApiHeader()
    {
        $header = [
            'type' => 'Application/Json',
            'client_id' => '1',
            'client_url' => __('api.API_CLIENT_URL'),
            'self_url' => __('api.API_SELF_URL'),
            'client_secret' => __('api.SECRET_KEY'),
        ];
        return $header;
    }

    //send data to other site function end


    //get data from api function start
    public static function getHeaderAuth($clientHeader)
    {
        $ownHeader = Self::getApiOwnHeader();
        $status = 200;
        $message = '';

        if ($clientHeader['self_url'] != $ownHeader['client_url']) {
            $status = 419;
            $message = __('english.THIS_URL_IS_NOT_REGISTERED');
        } elseif ($clientHeader['client_secret'] != $ownHeader['client_secret']) {
            $status = 419;
            $message = __('english.THIS_URL_IS_NOT_AUTHORIZED');
        }
        return [
            'status' => $status,
            'message' => $message,
        ];
    }


    public static function getApiOwnHeader()
    {
        $header = [
            'type' => 'Application/Json',
            'client_id' => '1',
            'self_url' => __('api.API_SELF_URL'),
            'client_url' => __('api.API_CLIENT_URL'),
            'client_secret' => __('api.SECRET_KEY'),
        ];
        return $header;
    }
    //get data from api function end


    // Api info end


}
