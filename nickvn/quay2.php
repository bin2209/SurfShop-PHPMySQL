<?php
require("TMQ/function.php");
require("TMQ/head.php");
?>

<style>
    .nickdaquay {
        position: fixed;
        z-index: 9999;
        bottom: 27%;
        right: 0px;
        max-width: 15%;
        min-width: 100px;
        min-height: 40px;
    }

    .chuy {
        position: fixed;
        z-index: 9999;
        bottom: 41%;
        right: 0px;
        max-width: 15%;
        min-width: 100px;
        min-height: 40px;
    }

    .napthebymanh {
        position: fixed;
        z-index: 9999;
        bottom: 34%;
        right: 0px;
        max-width: 15%;
        min-height: 40px;
        min-width: 100px;
    }

    img {
        max-width: 100%;
        transition: all 0.1s;
    }

    img {
        vertical-align: middle;
    }

    img {
        border: 0;
    }

    .text-center {
        text-align: center;
    }

    .c-content-client-logos-slider-1 .item {
        width: 100%
    }
    
    .box.box-solid.box-danger > .box-header {
    color: #fff;
    background: #dd4b39;
    background-color: #dd4b39;
}

    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        /* border-top: 3px solid #d2d6de; */
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 0px 0px rgba(0,0,0,0.1);
    }
    
    .box-title {
        text-transform: uppercase;
        text-align: center;
        padding: 13px;
        color: white;
    }
    
    .box-header.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    
    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
        text-align: center;
    }
    
    .box-body {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 15px;
    }

    /*.imgnen {*/
    /*    display: none;*/
    /*    cursor: pointer;*/
    /*    z-index: 2;*/
	   /*   transform: rotateY(0deg);*/
    /*}*/

    /*.imgqua {*/
      /* transform: rotateY(180deg); */
    /*}*/
    
    
    .flip-card {
      background-color: transparent;
      width: 100%;
      height: 300px;
      perspective: 1000px;
    }
    
    .flip-card:hover {
        animation-name: spaceboots;
      animation-duration: .8s;
      transform-origin: 50% 50%;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
      cursor: pointer;
    }
    
    
    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }
    
    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }
    
    .flip-card-front {
      color: black;
    }
    
    .flip-card-back {
      color: white;
      transform: rotateY(180deg);
    }

    .flip-box-inner {
      transition: 0.6s;
    	transform-style: preserve-3d;
    	position: relative;
    }

    .flipimg {
      /* perspective: 1000; */
    }

    .flip-box-inner img {
    	backface-visibility: hidden;
    	/* position: absolute;
    	top: 0;
    	left: 0; */
    }

    .c-white {
        color: white !important
    }

    .side-right {
        padding-top: 70px
    }

    .m-btn--custom {
        background: #fb236a;
        border: #fb236a;
        padding: 15px 20px;
        margin-left: 0px !important;
        font-weight: 600;
        font-size: 18px
    }

    .rotation {
      display: flex;
      flex-direction: column;
    }
    
    #evenstop10 {
        text-align: left;
    }


    .m-btn--custom:hover {
        background-color: hotpink !important
    }
    
    .top-purchase {
        margin-top: 50px;
    }
    
    .tops {
        padding: 0px 5px;
        width: 78px;
        font-size: 14px;
    }
    
    @media only screen and (min-width: 768px) {
        .tops {
            padding: 0px 5px;
            width: 100px;
            font-size: 18px;
        }
    }
    
    @media only screen and (max-width: 600px) {
        .flip-card {
          background-color: transparent;
          width: 100%;
          height: 200px;
          perspective: 1000px;
        }
    }
    
    @keyframes  spaceboots {
        0% {
            transform: translate(2px, 1px) rotate(0deg);
        }
    
        10% {
            transform: translate(-1px, -2px) rotate(-1deg);
        }
    
        20% {
            transform: translate(-3px) rotate(1deg);
        }
    
        30% {
            transform: translateY(2px) rotate(0deg);
        }
    
        40% {
            transform: translate(1px, -1px) rotate(1deg);
        }
    
        50% {
            transform: translate(-1px, 2px) rotate(-1deg);
        }
    
        60% {
            transform: translate(-3px, 1px) rotate(0deg);
        }
    
        70% {
            transform: translate(2px, 1px) rotate(-1deg);
        }
    
        80% {
            transform: translate(-1px, -1px) rotate(1deg);
        }
    
        90% {
            transform: translate(2px, 2px) rotate(0deg);
        }
    
        100% {
            transform: translate(1px, -2px) rotate(-1deg);
        }
    }

</style>
<div class="c-layout-page">

<style>
    .ui-autocomplete {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .input-group-addon {
            background-color: #FAFAFA;
        }

        .input-group .input-group-btn > .btn, .input-group .input-group-addon {
            background-color: #FAFAFA;
        }

        .modal {
            text-align: center;
        }

        @media        screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .c-layout-header-fixed.c-layout-header-topbar .c-layout-page {
                margin-top: 245px;
            }
        }

        @media        screen and (max-width: 767px) {
            .modal-dialog:before {
                margin-top: 75px;
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }

            .modal-dialog {
                width: 100%;

            }

            .modal-content {
                margin-right: 20px;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;


        }

        .mfp-wrap {
            z-index: 20000 !important;
        }

        .c-content-overlay .c-overlay-wrapper {
            z-index: 6;
        }

        .z7 {
            z-index: 7 !important;
        }
        
        
        .hello .btn-submit {
            border-color: none!important;
            outline: !important;
            width: 100%!important;
            text-align: center;
            font-weight: 700!important;
            font-size: 18px!important;
            color: #000000!important;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            background: linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -moz-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -o-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -ms-linear-gradient(to top, #FFE900 0%, #F2AC00 100%)!important;
            background: -webkit-linear-gradient(bottom, #FFE900 0%, #F2AC00 100%)!important;
        }
                
        
    .nickdaquay{position:fixed;
    z-index:9999;
    bottom:170px;
    right:0px;
    max-width: 15%;
    min-width: 120px;
    min-height: 120px;}
    .anhbymanh{position:fixed;
    z-index:9999;
    bottom:80px;
    left:0px;
    max-width: 29%;
    min-height: 20px;}
    .napthebymanh{position:fixed;
    z-index:9999;
    bottom:100px;
    right:0px;
    max-width: 15%;
    min-height: 40px;
    min-width: 100px;
    }
    .flex-list .item {
        width: 50%;
        padding: 0 30px;
    }
        .rotation {
        text-align: center;
    }

        .rotation .play-spin {
        width: 100%;
        position: relative;
        margin: 0 auto;
    }
    .rotation .play-spin .ani-zoom {
        position: absolute;
        display: block;
        width: 110px;
        z-index: 5;
        top: calc(50% - 70px);
        left: calc(50% - 55px);
    }
    .ani-zoom {
        -webkit-transition: all .2s linear;
        -moz-transition: all .2s linear;
        -ms-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }
    img {
        max-width: 100%;
    }
    img {
        vertical-align: middle;
    }
    img {
        border: 0;
    }
    .text-center {
        text-align: center;
    }
    li{
        list-style: none;
    }

    .form-notication-bottom {
    position: fixed;
    bottom: 20px;
    left: 10px;
    width: 330px;
    height: auto;
    background-color: #fff;
    border-radius: 40px;
    z-index: 1;
    box-shadow: 2px 2px 10px 2px hsla(0,0%,60%,.2);
    animation: example 8s infinite;
    max-width: calc(90% - 10px);
    overflow: hidden;
}


@keyframes    example{0%{bottom: -100px;}25%{bottom: 20px;} 50%{bottom: 20px;}100%{bottom: -100px;}}

li {
    list-style-type: none
}
.history {
    width: 40% !important;
}
@media    only screen and (max-width: 800px) {
    
    #rotate-play {
        width: 100% !important;
        max-width: 100% !important;
    }
    .rotation .play-spin .ani-zoom img {
        width: 85% !important;
    }
    .history {
        width: 100% !important;
    }
}
.c-content-box.c-size-md{
    padding: 0
}
.pd50{
    padding-top: 50px;
}
.list-roll{
    margin-top: 30px;
    margin-bottom: 30px;
}

@media    screen and (min-width: 800px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 400px;
        overflow-y: scroll;
        margin:0 auto;
    }
}

@media    screen and (min-width: 1600px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 600px;
        overflow-y: scroll;
        margin:0 auto;
    }
}

.btn-top{
    display: flex;
    justify-content: center;
    margin-bottom: 30px
}
.btn-top .btn{
    margin-left: 15px;
    margin-right: 15px;
    padding: 6px 20px;
}
.btn-top span{
    font-size: 25px;
}
@media    screen and (max-width: 640px) {
    .btn-top span{
        font-size: 17px;
    }
}

.flipimg img{
    opacity: 1;
}

.c-content-client-logos-slider-1 .item img{
    opacity: 1;
}

.modal-body{
    color: #333
}

.flipimg:hover {
  animation-name: spaceboots;
    animation-duration: .8s;
    transform-origin: 50% 50%;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    cursor: pointer;
}


@keyframes  spaceboots {
    0% {
        transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        transform: translate(-3px) rotate(1deg);
    }

    30% {
        transform: translateY(2px) rotate(0deg);
    }

    40% {
        transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        transform: translate(1px, -2px) rotate(-1deg);
    }
}



.btn + .btn{
    margin-left: 0!important;
}

.btn-right .btn{
    float: left;
    width: 100%;
    background: #fb236a;
    font-size: 13px;
    color: #ffffff;
    text-align: center;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    border: 2px solid #fb236a;
    padding: 11px 0;
    margin-top: 10px;
    font-size: 20px;
    font-weight: bold;
}

.btn-right .btn:hover{
    background-color: #ff8db2;
    border: 2px solid #ff8db2;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box-inner-flip {
  transform: rotateY(180deg);
}

.flip-box-front{
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  top: 0;
  left: 0;
}

.transparent{
    opacity: 0!important;
}

</style>

<style>
    .ui-autocomplete {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .input-group-addon {
            background-color: #FAFAFA;
        }

        .input-group .input-group-btn > .btn, .input-group .input-group-addon {
            background-color: #FAFAFA;
        }

        .modal {
            text-align: center;
        }

        @media        screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .c-layout-header-fixed.c-layout-header-topbar .c-layout-page {
                margin-top: 245px;
            }
        }

        @media        screen and (max-width: 767px) {
            .modal-dialog:before {
                margin-top: 75px;
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }

            .modal-dialog {
                width: 100%;

            }

            .modal-content {
                margin-right: 20px;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;


        }

        .mfp-wrap {
            z-index: 20000 !important;
        }

        .c-content-overlay .c-overlay-wrapper {
            z-index: 6;
        }

        .z7 {
            z-index: 7 !important;
        }
        
        
        
        
        
    .nickdaquay{position:fixed;
    z-index:9999;
    bottom:170px;
    right:0px;
    max-width: 15%;
    min-width: 120px;
    min-height: 120px;}
    .anhbymanh{position:fixed;
    z-index:9999;
    bottom:80px;
    left:0px;
    max-width: 29%;
    min-height: 20px;}
    .napthebymanh{position:fixed;
    z-index:9999;
    bottom:100px;
    right:0px;
    max-width: 15%;
    min-height: 40px;
    min-width: 100px;
    }
    .flex-list .item {
        width: 50%;
        padding: 0 30px;
    }
        .rotation {
        text-align: center;
    }

        .rotation .play-spin {
        width: 100%;
        position: relative;
        margin: 0 auto;
    }
    .rotation .play-spin .ani-zoom {
        position: absolute;
        display: block;
        width: 110px;
        z-index: 5;
        top: calc(50% - 70px);
        left: calc(50% - 55px);
    }
    .ani-zoom {
        -webkit-transition: all .2s linear;
        -moz-transition: all .2s linear;
        -ms-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }
    img {
        max-width: 100%;
    }
    img {
        vertical-align: middle;
    }
    img {
        border: 0;
    }
    .text-center {
        text-align: center;
    }
    li{
        list-style: none;
    }

    .form-notication-bottom {
    position: fixed;
    bottom: 20px;
    left: 10px;
    width: 330px;
    height: auto;
    background-color: #fff;
    border-radius: 40px;
    z-index: 1;
    box-shadow: 2px 2px 10px 2px hsla(0,0%,60%,.2);
    animation: example 8s infinite;
    max-width: calc(90% - 10px);
    overflow: hidden;
}


@keyframes    example{0%{bottom: -100px;}25%{bottom: 20px;} 50%{bottom: 20px;}100%{bottom: -100px;}}

li {
    list-style-type: none
}
.history {
    width: 40% !important;
}
@media    only screen and (max-width: 800px) {
    
    #rotate-play {
        width: 100% !important;
        max-width: 100% !important;
    }
    .rotation .play-spin .ani-zoom img {
        width: 85% !important;
    }
    .history {
        width: 100% !important;
    }
}
.c-content-box.c-size-md{
    padding: 0
}
.pd50{
    padding-top: 50px;
}
.list-roll{
    margin-top: 30px;
    margin-bottom: 30px;
}

@media    screen and (min-width: 800px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 400px;
        overflow-y: scroll;
        margin:0 auto;
    }
}

@media    screen and (min-width: 1600px) {
    .list-roll-inner{
        width: 85%;
        margin-top: 30px;
        max-height: 600px;
        overflow-y: scroll;
        margin:0 auto;
    }
}
.btn-top{
    display: flex;
    justify-content: center;
    margin-bottom: 30px
}
.btn-top .btn{
    margin-left: 15px;
    margin-right: 15px;
    padding: 6px 20px;
}
.btn-top span{
    font-size: 25px;
}
@media    screen and (max-width: 640px) {
    .btn-top span{
        font-size: 17px;
    }
}

.flipimg img{
    opacity: 1;
}

.c-content-client-logos-slider-1 .item img{
    opacity: 1;
}

.modal-body{
    color: #333
}

.flipimg:hover {
  animation-name: spaceboots;
    animation-duration: .8s;
    transform-origin: 50% 50%;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    cursor: pointer;
}


@keyframes  spaceboots {
    0% {
        transform: translate(2px, 1px) rotate(0deg);
    }

    10% {
        transform: translate(-1px, -2px) rotate(-1deg);
    }

    20% {
        transform: translate(-3px) rotate(1deg);
    }

    30% {
        transform: translateY(2px) rotate(0deg);
    }

    40% {
        transform: translate(1px, -1px) rotate(1deg);
    }

    50% {
        transform: translate(-1px, 2px) rotate(-1deg);
    }

    60% {
        transform: translate(-3px, 1px) rotate(0deg);
    }

    70% {
        transform: translate(2px, 1px) rotate(-1deg);
    }

    80% {
        transform: translate(-1px, -1px) rotate(1deg);
    }

    90% {
        transform: translate(2px, 2px) rotate(0deg);
    }

    100% {
        transform: translate(1px, -2px) rotate(-1deg);
    }
}



.btn + .btn{
    margin-left: 0!important;
}

.btn-right .btn{
    float: left;
    width: 100%;
    background: #fb236a;
    font-size: 13px;
    color: #ffffff;
    text-align: center;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    border: 2px solid #fb236a;
    padding: 11px 0;
    margin-top: 10px;
    font-size: 20px;
    font-weight: bold;
}

.btn-right .btn:hover{
    background-color: #ff8db2;
    border: 2px solid #ff8db2;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box-inner-flip {
  transform: rotateY(180deg);
}

.flip-box-front{
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
  top: 0;
  left: 0;
}

.transparent{
    opacity: 0!important;
}

</style>

<meta name="csrf-token" content="ChIjdazKKQt0g3zjdHQ8J6mNNYQ62YRxxOz65tgT">
<div class="c-content-title-1 pd50">
<h3 class="c-center c-font-uppercase c-font-bold">Lật Hình Vật Phẩm - 50k</h3>
<div class="c-line-center c-theme-bg"></div>
</div>
<div class="col-lg-2 col-md-hidden"></div>
<div class="col-lg-5 col-md-12">
<div class="c-content-box c-size-md">

<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
<div class="row row-flex-safari game-list" style="display: flex; flex-wrap: wrap">
<div class="item item-left">
 <section class="rotation row">
                                <div class="col-lg-12 boxflip">
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner0" class="flip-box-front imgqua inner0" src="/latthe/3000kc.jpg">
                                             
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner0" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner0" class="flip-box-front imgqua inner0" src="https://shopnct.com/upload-usr/images/px0rqbvrmk_1578913578.png"></div>-->
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                         <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner1" class="flip-box-front imgqua inner1" src="/latthe/111kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner1" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner1" class="flip-box-front imgqua inner1" src="https://shopnct.com/upload-usr/images/dt8fqie47s_1578913587.png"></div>-->
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                      <div class="flip-card">
                                      <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <img data-inner="inner2" class="flip-box-front imgqua inner2" src="/latthe/250kc.jpg">
                                        </div>
                                        <div class="flip-card-back">
                                           <img class='imgnen' src="/kimhung/nen.jpg">
                                        </div>
                                      </div>
                                        </div>
                                        <!--<div data-inner=" inner2" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner2" class="flip-box-front imgqua inner2" src="https://shopnct.com/upload-usr/images/eznaat9sk9_1578913613.png"></div>-->
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner3" class="flip-box-front imgqua inner3" src="/latthe/500kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner3" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner3" class="flip-box-front imgqua inner3" src="https://shopnct.com/upload-usr/images/mrshnjpnty_1578913566.png"></div>-->
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner4" class="flip-box-front imgqua inner4" src="/latthe/120kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner4" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner4" class="flip-box-front imgqua inner4" src="https://shopnct.com/upload-usr/images/jwssjznf8m_1578914969.png"></div>-->
                                    </div>
                                     <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner4" class="flip-box-front imgqua inner4" src="/latthe/89kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner4" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner4" class="flip-box-front imgqua inner4" src="https://shopnct.com/upload-usr/images/jwssjznf8m_1578914969.png"></div>-->
                                    </div>
                                     <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner5" class="flip-box-front imgqua inner5" src="/latthe/25000kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner4" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner4" class="flip-box-front imgqua inner4" src="https://shopnct.com/upload-usr/images/jwssjznf8m_1578914969.png"></div>-->
                                    </div>
                                     <div class="col-lg-4 col-md-3 col-sm-4 col-xs-6">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner6" class="flip-box-front imgqua inner6" src="/latthe/5000kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                               <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner4" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner4" class="flip-box-front imgqua inner4" src="https://shopnct.com/upload-usr/images/jwssjznf8m_1578914969.png"></div>-->
                                    </div>
                                    <div class="flipimg col-lg-4 col-md-3 col-sm-4 col-xs-6 flip-box">
                                        <div class="flip-card">
                                          <div class="flip-card-inner">
                                            <div class="flip-card-front">
                                                <img data-inner="inner7" class="flip-box-front imgqua inner7" src="/latthe/12000kc.jpg">
                                            </div>
                                            <div class="flip-card-back">
                                                 <img class='imgnen' src="/kimhung/nen.jpg">
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div data-inner=" inner5" class="flip-box-inner inner col-lg-12 col-md-12 col-sm-12" style="padding: 0"><img class="imgnen" src="https://shopnct.com/upload-usr/images/CYPNF6DXvr_1578914987.png"><img data-inner="inner5" class="flip-box-front imgqua inner5" src="https://shopnct.com/upload-usr/images/apljmkv4or_1578913636.png"></div>-->
                                    </div>
                                </div>
                              <div class="col-sm-12 btn-right">
<a id="upthe" style="cursor: pointer; " class="play col-xs-12 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Úp thẻ</span>
</span>
</a>
</div>
                              
                                <div class="col-lg-12">
                 
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                            </section>

<div class="table-body scrollbar-inner">
<table class="table table-bordered">
<tbody></tbody>
</table>
</div>
</div>

</div>
</div>
<div class="col-lg-1 col-md-hidden"></div>
<div class="col-lg-2 col-md-12 col-sm-12 btn-right">

<div class="text-center">
<h3 class="num-play">Bạn còn <span><?php echo number_format($TMQ['cash']); ?></span>VNĐ.</h3>
<br>
<h3 class="num-play">Bạn còn <span><?php echo number_format($TMQ['kimcuong']); ?></span>Kim Cương.</h3>
<li><a style="" class="ani-zoom btn-img deposit-btn disabled" href="/nap-the" data-toggle="modal" data-target="#modalBuy"><img src="assets/frontend/vongquay/image/mualuot.png" alt=""></a></li>
</div>
<a href="#" class="col-xs-12 thele btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Thể Lệ</span>
</span>
</a>
<a href="#" class="col-xs-12 luotquay btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Lượt lật hình gần đây</span>
</span>
</a>
<a href="/user/withdrawruby/2" class="col-xs-12 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Rút vật phẩm</span>
</span>
</a>

<a href="/rubyflip/logacc/1246" class="col-xs-12 btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">
<span>
<i class="la la-cloud-upload"></i>
<span>Lịch sử lật</span>
</span>
</a>
<div class="text-center"> &nbsp;</div>

</div>
<div class="col-lg-2 col-md-hidden"></div>
<div class="modal fade" id="theleModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thể Lệ</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".thele").on("click", function(){
            $("#theleModal").modal('show');
        })
        $(".uytin").on("click", function(){
            $("#uytinModal").modal('show');
        })
        $(".luotquay").on("click", function(){
            $("#luotquayModal").modal('show');
        })
    });
</script>
<div class="modal fade" id="uytinModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Uy Tín</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="luotquayModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Lượt lật hình gần đây</h4>
</div>
<div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
<div class="c-content-title-1" style="margin: 0 auto">
</div>
<div class="list-roll-inner">
<table cellpadding="10" class="table table-striped">
<tbody>
<tr>
<th>Tài khoản</th>
<th>Giải thưởng</th>
<th>Thời gian</th>
</tr>
</tbody>
<tbody>
<?php
$get = $db->query("SELECT * FROM `HK_lattheff` ORDER BY id DESC LIMIT 0,20");
if($get != null){
foreach($get as $ls){
?>			<tr>
<td><?= str_replace( substr(($ls['nguoiquay']), -3), '***', ($ls['nguoiquay']) );?></td>
<td><?=number_format($ls['kimcuong']);?> Kim cương</td>
<td><?=$ls['date'];?></td></tr>
<?php }
 }else{?>
     <tr>
     <td>Không có lượt lật hình nào gần đây.</td>
<td>Không có lượt lật hình nào gần đây.</td>
<td>Không có lượt lật hình nào gần đây.</td></tr>
<?
 } ?>
</tbody>
</table>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
</div>
<div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
àdsafdsafdsaf
</div>
<div class="modal-footer">
<a href="" id="btnWithdraw" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">Rút quà</a>
<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
</div>
</div>
</div>
</div>
<input type="hidden" id="ID_NROGEM" value="1802">
<input type="hidden" id="ID_NROCOIN" value="1801">
<input type="hidden" id="ID_NINJAXU" value="1795">
<input type="hidden" id="withdrawruby_1" value="Rút Quân Huy LQ">
<input type="hidden" id="withdrawruby_2" value="Rút Kim Cương FF">
<input type="hidden" id="withdrawruby_3" value="Rút +UC ( PUBG MB )">
<input type="hidden" id="withdrawruby_4" value="Rút +RP ( LMHT )">
<input type="hidden" id="withdrawruby_5" value="Rút Gem CF Mobile">
<input type="hidden" id="withdrawruby_6" value="Rút quà rương sohacoin ( làng lá )">
<input type="hidden" id="withdrawruby_7" value="Rút Quà Point (zingspeed mobile)">
 <input type="hidden" id="withdrawruby_8" value="Rút Quà FC (FIFA ONLINE 4)">
<input type="hidden" id="numgift" value="9">
	<link rel="stylesheet" type="text/css" href="https://acclienminhgiare.vn/frontend/plugins/sweetalert2.min.css">
	
<script type="text/javascript" src="https://acclienminhgiare.vn/frontend/plugins/sweetalert2.min.js"></script>
<script>
   $(document).ready(function() {
        $('.btn-helper').click(function() {
            $("#myModal1").modal("show");
            //btn-percent btn-3
        });

        $('#upthe').click(function() {
            $('.flip-card-inner').css('transform', 'rotateY(180deg)');
            setTimeout(function() {
                $('.imgqua').hide();
            }, 300)
        });

        $('.imgnen').click(function() {
            self = $(this);
            $.ajax({
                type: "POST",
                data: {type: "kimhunglatthefreefire"},
                url: "/ajax/quay2.php",
                success: function(result) {
                    json = JSON.parse(result);
                    if (json.status == "login") { window.location.href="/dang-nhap.php"; return; }
                    if (json.success) {
                        img = json.img;
                        index = self.parents('.boxflip').find('.imgnen').index(self);
                        $(self.parent()).parent().find('.imgqua').attr('src', img);
                        $(self.parent()).parent().css('transform', 'none');
                        $(self.parent()).parent().find('.imgqua').show();
                        self.parent().find('.imgnen').hide();

                        setTimeout(function() {
                            j = 0;
                            json.list.forEach((item, i) => {
                                if (i === index) {
                                    j = j + 1;
                                }
                                pos = j + i;
                                self.parents('.boxflip').find('.imgqua').eq(pos).attr('src', item);
                            });
                            $('.imgqua').show();
                            $('.flip-card-inner').css('transform', 'none');
                            $('.imgnen').hide();
                            $('#upthe').show();
                        }, 1000);
                        setTimeout(function() {
                          swal("Thông Báo!",  json.msg, "success");
                            $("*").click(function() {
                                window.location.reload();
                            });
                        }, 2000);
                    } else {
                       swal("Thông Báo!",  json.msg, "error");
                    }
                }
            });
        });

        $('#thele').click(function() {
            $('#theleModal').modal('show');
        });

        $('.luuy').click(function(e) {
            e.preventDefault();
            $('#theleModal').modal('show');
        });
    });
</script>

</div><div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
<div class="modal-content">
</div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>
</div>
<?php }
require("TMQ/end.php");
?>