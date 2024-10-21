<x-app-layout>

  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

    <style>
        .fondo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .rv {
            position: absolute;
            right: 10px;
            top: 70px;
        }
        img {
            display: block;
        }
    </style>

    {{-- <div class="fondo">
        <img id="iz" src="{{ asset('images/body.png') }}" alt="">
    </div>

    <div class="rv">
        <img id="de" src="{{ asset('images/rv.png') }}" alt="">
    </div> --}}

</x-app-layout>
