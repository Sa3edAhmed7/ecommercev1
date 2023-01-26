<div class="main-content" wire:poll>
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card">
              <div class="body">
                <div id="plist" class="people-list">
                  <div class="chat-search">
                    <div class="chat-with">Chat</div>
                  </div>
                  <div class="m-b-20">
                    <div id="chat-scroll">
                      <ul class="chat-list list-unstyled m-b-0">
                        @foreach ($conversations as $conversation)
                        @if ($conversation->sender_id === auth()->id())
                        <li class="clearfix {{ $conversation->id === $selectedConversation->id ? 'active' : ''}}" wire:click.prevent="viewMessage({{ $conversation->id }})">
                          <img src="{{asset('assets/images/profile')}}/{{ $conversation->receiver->profile_photo_path }}" alt="avatar">
                          <div class="about">
                            <div class="name">{{$conversation->receiver->name}}</div>
                            <div class="status">
                              <i class="material-icons offline">fiber_manual_record</i>
                            {{$conversation->messages->last()?->created_at->format('d/m/Y')}}</div>
                            <p><strong>{{$conversation->messages->last()?->body}}</strong></p>
                          </div>
                        </li>
                        @else
                        <li class="clearfix {{ $conversation->id === $selectedConversation->id ? 'active' : ''}}" wire:click.prevent="viewMessage({{ $conversation->id }})">
                            <img src="{{asset('assets/images/profile')}}/{{ $conversation->sender->profile_photo_path }}" alt="avatar">
                            <div class="about">
                              <div class="name">{{$conversation->sender->name}}</div>
                              <div class="status">
                                <i class="material-icons offline">fiber_manual_record</i>
                              {{$conversation->messages->last()?->created_at->format('d/m/Y')}}</div>
                              <p><strong>{{$conversation->messages->last()?->body}}</strong></p>
                            </div>
                          </li>
                        @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="card">
              <div class="chat">
                @if ($conversation->sender_id === auth()->id())
                <div class="chat-header clearfix">
                  <img src="{{asset('assets/images/profile')}}/{{$selectedConversation->receiver->profile_photo_path}}" alt="avatar">
                  <div class="chat-about">
                    <div class="chat-with">{{$selectedConversation->receiver->name}}</div>
                  </div>
                </div>
                @else
                <div class="chat-header clearfix">
                    <img src="{{asset('assets/images/profile')}}/{{$selectedConversation->sender->profile_photo_path}}" alt="avatar">
                    <div class="chat-about">
                      <div class="chat-with">{{$selectedConversation->sender->name}}</div>
                    </div>
                  </div>
                @endif
              </div>
              <div class="chat-box" id="mychatbox">
                <div class="card-body chat-content">
                    @foreach ($selectedConversation->messages as $message)
                    <div class="chat-item chat-{{ $message->user_id === auth()->id() ? 'right' : 'left' }}" style="">
                        <img src="{{asset('assets/images/profile')}}/{{ $message->user->profile_photo_path }}">
                        <div class="chat-details">
                            <div class="chat-text">{{ $message->body }}</div>
                            <div class="chat-time">{{ $message->created_at->format('d M h:i a') }}</div>
                        </div>
                    </div>
                    @endforeach

              </div>
              <div class="card-footer chat-form">
                <form id="chat-form" wire:submit.prevent="sendMessage">
                  <input wire:model.defer="body" type="text" id="#mychatbox" class="form-control" placeholder="Type a message" onfocus="this.value=''">
                  <button class="btn btn-primary">
                    <i class="far fa-paper-plane"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  @push('scripts')
  <script>
      "use strict";
  
  $.chatCtrl = function (element, chat) {
  var chat = $.extend({
  position: 'chat-right',
  text: '',
  time: moment(new Date().toISOString()).format('hh:mm'),
  picture: '',
  type: 'text', // or typing
  timeout: 0,
  onShow: function () { }
  }, chat);
  
  var target = $(element),
  element = '<div class="chat-item ' + chat.position + '" style="display:none">' +
    '<img src="' + chat.picture + '">' +
    '<div class="chat-details">' +
    '<div class="chat-text">' + chat.text + '</div>' +
    '<div class="chat-time">' + chat.time + '</div>' +
    '</div>' +
    '</div>',
  typing_element = '<div class="chat-item chat-left chat-typing" style="display:none">' +
    '<img src="' + chat.picture + '">' +
    '<div class="chat-details">' +
    '<div class="chat-text"></div>' +
    '</div>' +
    '</div>';
    
  var append_element = element;
  if (chat.type == 'typing') {
  append_element = typing_element;
  }
  
  if (chat.timeout > 0) {
  setTimeout(function () {
    target.find('.chat-content').append($(append_element).fadeIn());
  }, chat.timeout);
  } else {
  target.find('.chat-content').append($(append_element).fadeIn());
  }
  
  var target_height = 0;
  target.find('.chat-content .chat-item').each(function () {
  target_height += $(this).outerHeight();
  });
  setTimeout(function () {
  target.find('.chat-content').scrollTop(target_height, -1);
  }, 100);
  chat.onShow.call(this, append_element);
  }
  
  if ($("#chat-scroll").length) {
  $("#chat-scroll").css({
  height: 450
  }).niceScroll();
  }
  
  if ($(".chat-content").length) {
  $(".chat-content").niceScroll({
  cursoropacitymin: .3,
  cursoropacitymax: .8,
  });
  $('.chat-content').getNiceScroll(0).doScrollTop($('.chat-content').height());
  }
  var chats = [
  {
  typing: true,
  position: 'left'
  }
  ];
  for (var i = 0; i < chats.length; i++) {
  var type = 'text';
  if (chats[i].typing != undefined) type = 'typing';
  $.chatCtrl('#mychatbox', {
  text: (chats[i].text != undefined ? chats[i].text : ''),
  position: 'chat-' + chats[i].position,
  type: type
  });
  }
  
  $("#chat-form").submit(function () {
  var me = $(this);
  
  if (me.find('input').val().trim().length > 0) {
  $.chatCtrl('#mychatbox', {
    text: me.find('input').val(),
    picture: 'assets/login/img/users/user-5.png',
  });
  me.find('input').val('');
  }
  return false;
  });
  
  
  
  </script>

  @endpush
