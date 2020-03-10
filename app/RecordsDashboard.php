<?php

namespace App;


trait RecordsDashboard
{
    
    protected static function bootRecordsDashboard()
    {
        if (auth()->guest()) return;

        foreach (static::getDashboardsToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordDashboard($event);
            });
        }
    }

    
    protected static function getDashboardsToRecord()
    {
        return ['created'];
    }

    protected function recordDashboard($event)
    {
        $this->dashboard()->create([
            'user_id' => auth()->id(),
            'type' => $this->getDashboardType($event)
        ]);
    }

   
    public function dashboard()
    {
        return $this->morphMany('App\Dashboard', 'subject');
    }

    
    protected function getDashboardType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());

        return "{$event}_{$type}";
    }
}