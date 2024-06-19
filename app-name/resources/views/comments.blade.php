<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" style="background-color: #212121">
                    <div class="chat-container">
                        <div class="title">
                            <h1 style="font-size: xx-large;" align="center">Chat</h1>
                        </div>
                        @auth
                            <div class="chat-box">
                                @foreach($comments as $comment)
                                    <div class="message-container {{ ($comment->user_id == \Auth::user()->id) ? 'current-user' : '' }}">
                                        <div class="message">
                                            <div class="message-header">
                                                <span class="user-name">{{$comment->user->name}}</span>
                                                    <span class="timestamp">{{$comment->created_at}}</span>
                                            </div>
                                            <p class="message-body">{{$comment->message}}</p>
                                        </div>
                                            @if($comment->user_id == \Auth::user()->id)
                                                <div class="points" style="background-color: white; border-radius: 0 0 10px 0; display: flex; align-items: center; justify-content: center;">
                                                <x-dropdown align="right" width="48">
                                                                <x-slot name="trigger">
                                                                    <button class="inline-flex items-center border-transparent text-sm leading-4 font-medium text-gray-500 dark:text-gray-400 transition ease-in-out duration-150" style="width: 100%; border: 0; vertical-align: center">
                                                                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="48" height="48" id="menu" style="background-color: white; border: 0; margin: auto">
                                                                            <path fill="none" d="M0 0h48v48H0z"></path>
                                                                            <path d="M24 16c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 4c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 12c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"></path>
                                                                        </svg>
                                                                    </button>
                                                                </x-slot>
                                                    <x-slot name="content">
                                                        <x-dropdown-link :href="route('edit', $comment)">
                                                            Edit
                                                        </x-dropdown-link>

                                                        <x-dropdown-link :href="route('delete', $comment->id)" onclick="return confirm('Jesteś pewien?')">
                                                            Delete
                                                        </x-dropdown-link>
                                                    </x-slot>
                                                </x-dropdown>
                                                </div>
                                            @endif
                                    </div>
                                @endforeach
                            </div>
                        <br>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="box box-primary ">
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form"  action="{{ route('store') }}" id="comment-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="box">
                                        <div class="box-body">
                                            <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box" style="display: flex">
                                                <div style="width: 100%; color: #181818; display: inline-block;"><textarea name="message" id="message" style="width: 100%; height: 100%; resize: none; border: 0; border-radius: 10px 0 0 10px" required></textarea></div>
                                                <div class="chat-button box-footer"><button type="submit" id="sendBtn" class="btn btn-success"><i class="fa fa-chevron-right"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                        @endauth
                    </div>
                    @guest
                        <div class="table-container">
                            <b>Zarejestruj się albo Zaloguj się aby korzystać z Czatu.</b>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
