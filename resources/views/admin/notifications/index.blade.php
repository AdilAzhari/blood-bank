@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8 px-4 md:px-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('Notifications') }}</h1>
        </div>

        <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            @if($unreadNotifications->isEmpty())
                <p class="text-gray-600 dark:text-gray-400">{{ __('No unread notifications') }}</p>
            @else
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($unreadNotifications as $notification)
                        <li class="p-4 flex items-center justify-between">
                            <div class="text-sm text-gray-900 dark:text-gray-300">
                                {{ $notification->data['message'] }}
                            </div>
                            <div>
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Mark as Read') }}
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
