<?php

use Illuminate\Database\Eloquent\Model;
use Zerotoprod\AppLog\Database\Factories\AppLogFactory;
use Zerotoprod\AppLog\Models\AppLog;
use Illuminate\Support\Collection;

if (!function_exists('app_log')) {
    /**
     * @param array<string, mixed> $attributes = ['id' => null, 'cartid' => null, 'amazon_order_id' => null, 'order_item_ids' => null, 'imported_at' => null, 'has_overstock' => null]
     * @param ?int $count
     * @param array<int, mixed>|callable $state
     * @return Collection<Model>|Model|AppLog
     */
    function app_log(array $attributes = [], ?int $count = null, array|callable $state = []): Model|Collection|AppLog
    {
        return app_log_f($count, $state)->create($attributes);
    }
}
if (!function_exists('app_log_f')) {
    /**
     * @param int|array<int, mixed>|null $count_or_attributes = ['id' => null, 'cartid' => null, 'amazon_order_id' => null, 'order_item_ids' => null, 'imported_at' => null, 'has_overstock' => null]
     * @param callable|array<int, mixed> $state
     */
    function app_log_f(array|int|null $count_or_attributes = [], callable|array $state = []): AppLogFactory
    {
        return AppLog::factory($count_or_attributes, $state);
    }
}
