/**
 * Created by Andrey Shamis on 10/04/17.
 */

function onBoilerPageLoad(){
    setBoilerTimeout();
    colorsOnLoad();
}

function setBoilerTimeout(){
    setTimeout('window.open(\"/\", \"_self\");', 180000);
}

function colorsOnLoad(){
    var obj = $('.boilerStatus');
    var temp = $('.temperature');
    if (obj.text() == '0') {
        $('#disableBoiler').remove();
        obj.toggleClass('bg_green');
        temp.toggleClass('bg_green');
        obj.text('Off');
    }
    else {
        $('#enableBoiler').remove();
        obj.toggleClass('bg_red');
        temp.toggleClass('bg_red');
        obj.text('On')
    }
}