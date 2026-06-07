<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    <link href="{{asset('css/skeleton.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('storage/js/app.js') }}"></script>

    @stack('styles')
</head>
<body>
<div class="container">
    @if(Session::has('message'))
        <div class="session-notification" role="status" aria-live="polite">
            <p class="session-notification__label">Notification</p>
            <p class="session-notification__message">{{ Session::get('message') }}</p>
            <span class="session-notification__timer" aria-hidden="true"></span>
        </div>
    @endif
<div class="eleven columns nav-header-group">
    <ul>
        <li>
            <a style="padding:10px;margin-left:10px;" href="{{ Request::path() == 'tasks/create' ? '#' : route('tasks.create') }}">
                <button class="{{ Request::path() == 'tasks/create' ? 'disabled' : 'button-primary' }}">New Task</button>
            </a>
          <span style="text-wrap-style: balance;font-variant: petite-caps;">  <h4 class="title_header">Tasks List</h4></span>
            <a style="padding:10px;margin-left:10px;" href="{{ Request::path() == '/' ? '#' : route('tasks.index') }}">
                <button class="all_tasks {{ Request::path() == '/' ? 'disabled' : 'button-primary' }}">All Tasks</button>
            </a>
        </li>
    </ul>
</div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
