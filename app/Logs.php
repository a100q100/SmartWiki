<?php

namespace SmartWiki;

use Illuminate\Database\Eloquent\Model;

/**
 * SmartWiki\Logs
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $original_data 操作前的原数据
 * @property string $present_data 操作后的数据
 * @property string $content 日志内容
 * @property string $create_time 创建时间
 * @property integer $create_at 创建人
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs whereOriginalData($value)
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs wherePresentData($value)
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs whereCreateTime($value)
 * @method static \Illuminate\Database\Query\Builder|\SmartWiki\Logs whereCreateAt($value)
 */
class Logs extends ModelBase
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['id'];

    public $timestamps = false;

    /**
     * 添加一条日志
     * @param string $content 日志内容
     * @param int $user_id 用户ID
     * @param string|null $original_data
     * @param string|null $present_data
     * @return bool
     *
     */
    public static function addLogs($content,$user_id,$original_data = null,$present_data = null)
    {
        $logs = new Logs();
        $logs->create_at = $user_id;
        $logs->content = $content;
        $logs->original_data = $original_data;
        $logs->present_data = $present_data;

        return $logs->save();
    }

}
