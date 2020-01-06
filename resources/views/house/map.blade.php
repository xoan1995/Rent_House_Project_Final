<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .leftr {
        float: left;
        margin-right: 2%;
        background-color: rgb(251, 251, 251);
        z-index: 4;
        position: fixed;
        width: 313px;
        box-shadow: rgba(180, 185, 193, 0.4) 0px 21px 75px;
        margin-top: 0px;
        padding: 24px 24px 46px;
        border-width: 0px 2px 2px;
        border-style: solid solid solid;
        border-color: rgb(255, 255, 255) rgb(255, 255, 255) rgb(255, 255, 255);
        border-image: initial;
        border-top: 0px;
        border-radius: 0 0 10px 10px;
    }

    .light {
        margin: 0 auto;
        padding-top: 30px;
        width: 100%;
    }

    .light input[type="text"] {
        border: 1px solid #a7a7a7;
        float: left;
        height: 22px;
        padding: 4px;
        padding-left: 33px;
        width: 270px;
        padding-top: 9px;
        margin-top: 3px;
    }

    .flipout {
        width: 49%;
        float: left;
        margin-top: 34px;
    }

    #flipswitchWrapper {
        display: inline;
    }

    .other {
        width: 49%;
        float: left;
        margin-left: 2%;
        margin-top: 34px;
    }

    .clear {
        clear: both;
    }

    h3.mapz {
        display: block;
        margin-right: 10px;
        margin-bottom: 0;
        margin-top: 0px;
        font-weight: 500;
        font-size: 15px;
    }

    button.btn, button.btns {
        background-color: #51a976;
        border: none;
        border-radius: 3px;
        color: #FFF;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        transition: all 300ms ease-out;
        display: inline;
        width: 24px;
        height: 29px;
    }

    #zoom {
        position: relative;
        top: 7px;
        width: 80px;
        margin: 0px 5px;
    }

    .mapouter {
        position: relative;
        text-align: right;
        height: 700px;
        width: 1150px;
    }

    #gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 700px;
        width: 1150px;
    }

    iframe {
        width: 100%;
        height: 100%;
        display: block;
    }
</style>
<body>
<div class="row">
    <div class="col-lg-4 leftr" style="float: left">
        <div class="light"><h2>Enter your Address:</h2><input type="text" name="s" id="s"
                                                              value="{{$house->city->name}} - {{$house->district->name}} -{{$house->address}}"
                                                              placeholder="Enter Adress" data-role="none"></div>

        <div class="other"><h3 class="mapz">Map Zoom </h3>
            <button class="btns" data-role="none">-</button>
            <input data-role="none" id="zoom" type="range" min="1" max="20" step="2" value="13"
                   onchange="console.log(this.value)">
            <button class="btn" data-role="none">+</button>
            <img src="" alt="" class="" id="img"></div>
        <div class="clear"></div>
        <div class="container d">
            <div class="right">
                <div class="input-group" style=" margin-top: 11px;"><input type="text" name="width"
                                                                           class="form-control" id="width"
                                                                           value="600" placeholder=""
                                                                           style="height: 10px;font-size: 14px;padding-top: 10px;line-height: 0;"
                                                                           data-role="none"><span
                        class="input-group-addon" data-role="none"
                        style="height: 12px;font-size: 13px;border-radius: 0px 3px 3px 0px;margin-left: -1px;">px</span>
                </div>
            </div>
            <div class="left">Width:
                <div id="slider" data-role="none"
                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><span
                        tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 55.5144%;"></span></div>
            </div>
        </div>
        <div class="container e">
            <div class="right">
                <div class="input-group"><input type="text" name="ac" class="form-control" id="ac" value="500"
                                                placeholder="" data-role="none"><span class="input-group-addon"
                                                                                      data-role="none">px</span>
                </div>
            </div>
            <div class="left">Height:
                <div id="slider2" data-role="none" style="float:left;width:100%;"
                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><span
                        tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                        style="left: 46.2465%;"></span></div>
            </div>
        </div>
        <div class="clear"></div>

    </div>

    <div class="col-lg-8" style="float: right">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="600" height="500" id="gmap_canvas"
                        src="https://maps.google.com/maps?q={{$house->address}}=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0">
                    <a href="https://www.embedgooglemap.net"></a>
                </iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>
