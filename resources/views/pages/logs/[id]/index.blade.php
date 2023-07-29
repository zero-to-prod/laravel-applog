<x-applog::main>
<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-6 sm:px-6">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Log Information</h3>
    </div>
    <div class="border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3 font-mono">
                <dt class="text-sm font-medium leading-6 text-gray-900">ID</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->id}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Context ID</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->context_id}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">User ID</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->user_id}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Message</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->message}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Context</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->context}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Level</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->level}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Level Name</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->level_name}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Channel</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->channel}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Record Datetime</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->record_datetime}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Extra</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->extra}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Formatted</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->formatted}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Remote Address</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->remote_address}}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">User Agent</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->user_agent}}</dd>
            </div>
            <div class="bg-white px-4 py-2 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-3">
                <dt class="text-sm font-medium leading-6 text-gray-900">Created At</dt>
                <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 font-mono">{{$log->created_at}}</dd>
            </div>
        </dl>
    </div>
</div>
</x-applog::main>
