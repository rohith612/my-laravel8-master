<div {{ $attributes->merge([ 'class' => 'alert alert-' . $level .' alert-dismissible fade show' ]) }} role="alert">
    @if (is_array($message))
       {{-- Loop through an array of messages --}}
       <ul class="c-alert__message">
          @foreach($message as $item)
             <li>{{ $item }}</li>
          @endforeach
       </ul>
    @else
       {{-- Display string message --}}
       <p class="c-alert__message">{{ $message }}</p>
    @endif
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
        <span aria-hidden="true">&times;</span>
      </button> --}}
    {{-- Allow additional HTML --}}
    {{ $slot }}
 </div>