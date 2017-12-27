/**
 * Created by Andrey Shamis on 10/04/17.
 */
function createCORSRequest(method, url) {
    var xhr = new XMLHttpRequest();
    if ("withCredentials" in xhr) {

        // Check if the XMLHttpRequest object has a "withCredentials" property.
        // "withCredentials" only exists on XMLHTTPRequest2 objects.
        xhr.open(method, url, true);

    } else if (typeof XDomainRequest != "undefined") {

        // Otherwise, check if XDomainRequest.
        // XDomainRequest only exists in IE, and is IE's way of making CORS requests.
        xhr = new XDomainRequest();
        xhr.open(method, url);

    } else {

        // Otherwise, CORS is not supported by the browser.
        xhr = null;

    }
    return xhr;
}
function onBoilerPageLoad(){
    $("#content").html(buildContentBody());
    for (var key in boiler) {
        $("#"+key).text(boiler[key]);
        console.log(key + ":" + boiler[key]);
    }
    $("#temperatureKeep").val($("#keep_temperature").text());
    setBoilerTimeout();
    colorsOnLoad();
}


function setBoilerTimeout(){
    setTimeout('window.open(\"/\", \"_self\");', 180000);
}

function colorsOnLoad(){
    var obj = $('.boilerStatus');
    var temp = $('.temperature');
    console.log(obj.text());
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

function buildContentBody(){
    //noinspection JSAnnotator
    var content = `
<table style='width: 100%;'>
    <thead>
    <tr>
        <th>Controll</th>
        <th>Info</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <table>
            <tbody>
            <tr>
                <td>Time</td>
                <td><div id='time_str' class='time'></div><div id='time_epoch' class='timeEpoch'></div></td>
            </tr>
            <tr class='temperature'>
                <td>Current Temp</td>
                <td><h2><span id='current_temperature'></span>C[Max possible temperature <span id='max_temperature'></span>]</h2></td>
            </tr>
            <tr><td>Refresh</td>
                <td><form action='/'><input style='font-size:82px' type='submit' value='Refresh'></form></td>
            </tr>
            <tr id='enableBoiler'>
                <td>Enable Boiler</td>
                <td><form action='/eb'><input style='font-size:72px' type='submit' value='Enable Boiler'></form></td>
            </tr>
            <tr id='disableBoiler'>
                <td>Disable Boiler</td>
                <td><form action='/db'><input style='font-size:72px' type='submit' value='Disable Boiler'></form></td>
            </tr>
            <tr id='keepMode'>
                <td>Keep</td>
                <td>
                    <form action='/keep'>
                        <input style='font-size:22px' type='number' step='any' value='40' name='temperatureKeep' id='temperatureKeep' maxlength='5' />
                        <input style='font-size:62px' type='submit' value='Keep'>
                    </form>
                </td>
            </tr>
            </tbody>
            </table>
        </td>
        <td>
            <table>
            <tbody>
                <tr><td>Boiler MODE</td><td><div id='bolier_mode' class='boilerMode'>1</div></td></tr>
                <tr class='boilerModeDescLine'><td>Boiler MODE Desc</td><td><div id='boiler_mode_description' class='boilerModeDesc'>Keep TMP=<span id='keep_temperature'></span> C </div></td></tr>
                <tr><td>Boiler status</td><td><div id='boiler_status' class='boilerStatus'>-1</div></td></tr>
                <tr><td>Disabled by watch</td><td><div class='disabledByWatchDog'>0</div></td></tr>
                <tr><td>FlashChipId</td><td><div id='flash_chip_id'></div></td></tr>
                <tr><td>FlashChipSize</td><td><div id='flash_chip_size'></div></td></tr>
                <tr><td>FlashChipSpeed</td><td><div id='flash_chip_speed'></div></td></tr>
                <tr><td>FlashChipMode</td><td><div id='flash_chip_mode'></div></td></tr>
                <tr><td>CoreVersion/SdkVersion</td><td><span id='core_version'></span> / <span id='sdk_version'></span> </td></tr>
                <tr><td>BootVersion/BootMode</td><td><span id='boot_version'></span> / <span id='boot_mode'></span> </td></tr>
                <tr><td>CpuFreqMHz</td><td><div id='cpu_freq'></div></td></tr>
                <tr><td>macAddress</td><td><div id='mac_addr'></div></td></tr>
                <tr><td>HostName</td><td><div id='hostname'></div></td></tr>
                <tr><td>Channel/RSSI</td><td><span id='wifi_channel'></span> / <span id='rssi'></span> dbm</td></tr>
                <tr><td>SketchSize/FreeSketchSpace</td><td><span id='sketch_size'></span> / <span id='free_sketch_size'></span></td></tr>
                <tr><td>Dallas Address</td><td><div id='dallas_addr'></div></td></tr>
            </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
    `;
    return content;
}

