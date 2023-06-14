@if ($slot=='Kode Kelas')
<div {{ $attributes->merge(['class' => 'flex']) }}>
    <span {{ $attributes->merge(['class' => 'font-semibold']) }}>{{ $slot }} </span>&nbsp;
    {{ $text }}
    <button class="fullscreen" data-modal-target="fullScreen-modal" data-modal-toggle="fullScreen-modal"><x-full-screen></x-full-screen></button>
</div>
@else
<span {{ $attributes->merge(['class' => 'font-semibold']) }}>{{ $slot }}</span> &nbsp;
    {{ $text }} <br>
@endif