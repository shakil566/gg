<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Helper
{


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


    public static function statusList()
    {
        return ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')];
    }

}
