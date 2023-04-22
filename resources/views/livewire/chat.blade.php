<div class="rounded-md grid md:grid-cols-4 overflow-hidden">
        <div class="bg-white w-full block shadow" wire:poll>
            <div class="bg-[#20344c] block py-4 px-6 text-white">Контакты</div>
            <div>
                <ul>
                    @foreach ($conversations ?:[] as $conversation)
                        <li class="px-2 py-4 {{ $conversation->id === $selectedConversation->id ? 'bg-cyan-100' : '' }}">
                            <a href="#" class="flex space-x-2 items-center" wire:click.prevent="viewMessage( {{ $conversation->id }})">
                                <img class="rounded-full h-8 w-8" src="{{ $conversation->sender_id === auth()->id() ? ($conversation->receiver->getFirstMediaUrl() ? $conversation->receiver->getFirstMediaUrl() : asset('images/profile-placeholder.png')) : ($conversation->sender->getFirstMediaUrl() ? $conversation->sender->getFirstMediaUrl() : asset('images/profile-placeholder.png')) }}" alt="User Avatar">
                                <div>
                                    <span>
                                        @if ($conversation->sender_id === auth()->id())
                                            {{ $conversation->receiver->name }}
                                        @else
                                            {{ $conversation->sender->name }}
                                        @endif
                                    </span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="md:col-span-3 bg-slate-100 py-4 px-4 lg:px-8 w-full block">
            <div class="bg-white rounded-md shadow">
                <div class="bg-[#20344c] block py-4 px-6 text-white rounded-sm">
                    @isset($conversation)
                        <span>
                            Чат с
                            @if ($conversation->sender_id === auth()->id())
                                {{ $selectedConversation->receiver->name }}
                            @else
                                {{ $selectedConversation->sender->name }}
                            @endif
                        </span>
                    @endisset
                </div>

                <div class="p-4 h-[500px] overflow-auto" id="conversation">
                    @isset($selectedConversation)
                    <!-- Message. Default to the left -->
                    @foreach ($selectedConversation->messages as $message)
                        <div class="my-4 block {{ $message->user_id === auth()->id() ? 'text-right' : '' }}">
                            <div class="p-2">
                                <span class="block text-[12px] font-semibold">
                                    {{ $message->user->id === auth()->id() ? 'Вы' : $message->user->name }}
                                </span>
                                <span class="block text-[10px]">{{ $message->created_at->format('d M h:i a') }}</span>
                            </div>
                            <!-- /.direct-chat-infos -->
                            <!-- /.direct-chat-img -->
                            <div class="p-2 rounded {{ $message->user_id === auth()->id() ? 'bg-cyan-100' : 'bg-slate-100' }}">
                                {{ $message->body }}
                            </div>
                            <!-- /.direct-chat-text -->
                        </div>
                    @endforeach
                    <!-- /.direct-chat-msg -->
                    @endisset
                </div>


                <div class="block w-full p-4">
                    <form wire:submit.prevent="sendMessage" action="#">
                        <div class="my-6">
                            <input wire:model.defer="body" type="text" name="message" placeholder="Начните печатать сообщение ..."
                                @class([
                                  'border border-slate-100 rounded-sm p-4 w-full focus:outline-none focus:ring focus:ring-[#51c0ff]',
                                  'border !border-red-500' => $errors->first('body'),
                              ])
                            >
                            <span class="mt-4 block">
                                <button type="submit" class="block rounded-md w-full px-4 md:w-max bg-[#51c0ff] focus:bg-[#007bff] focus:outline-none focus:ring focus:ring-[#51c0ff] text-white py-2 text-center">Отправить</button>
                            </span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        let container = document.querySelector('#conversation');

        window.addEventListener('DOMContentLoaded', () => {
            scrollDown();
        });

        window.addEventListener('scrollDown', () => {
            Livewire.hook('message.processed', () => {
               if(container.scrollTop + container.clientHeight + 200 < container.scrollHeight){
                   return;
               }
               scrollDown();
            });
        });

        function scrollDown() {
            container.scrollTop = container.scrollHeight;
        }
    </script>
@endpush
