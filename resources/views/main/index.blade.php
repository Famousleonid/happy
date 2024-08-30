
@extends('master')

@section('content')

   @include('components.side-menu')

   <style>
        .div-rotate1 {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .div-rotate2 {
            position: absolute;
            top: 35%;
            left: 50%;
        }


        .rotating-text {
           font-size: 70px;
           font-weight: bold;
           color: #007bff; /* Синий цвет */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Добавление тени */

           /*text-transform: uppercase;*/
           animation: rotateInText 5s linear infinite;

       }
        .rotating-img {
            /* font-size: 100px;*/
            /*font-weight: bold;*/
            color: #007bff; /* Синий цвет */
            /*text-transform: uppercase;*/
            animation: rotateInDepth 5s linear infinite;

        }

       @keyframes rotateInDepth {
           0%, 100% {
               transform: translate(-50%, -50%) rotateY(0deg);
           }
           25% {
               transform: translate(-50%, -50%) rotateY(40deg);
           }
           75% {
               transform: translate(-50%, -50%) rotateY(-40deg);
           }
       }

        @keyframes rotateInText {
            0%, 100% {
                transform: translate(-50%, -50%) rotateY(40deg);
            }
            25% {
                transform: translate(-50%, -50%) rotateY(0deg);
            }
            75% {
                transform: translate(-50%, -50%) rotateY(-40deg);
            }
        }
   </style>
    <div class="div-rotate1">
        <p class="rotating-text">HappyNat</p>
    </div>
   <div class="div-rotate2">
       <img class="rotating-img" src="{{asset('img/balloon.png')}}" alt="logo" width="200px">
   </div>

@endsection
