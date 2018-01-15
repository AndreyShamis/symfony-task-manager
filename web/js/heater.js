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
function onLoadPageLoad(){
    $("#content").html(buildContentBody());
    for (var key in load) {
        $("#"+key).text(load[key]);
        console.log(key + ":" + load[key]);
    }
    var dev_count_obj = eval($("#dallas_addrs").text());
    var dev_count = dev_count_obj.length;
    $("#dallas_count").text(dev_count);
    $("#help_box").html("/setDallasIndex?outTmpIndex=1<br/>/setDallasIndex?outTmpIndex=0");
    $("#temperatureKeep").val(parseFloat($("#keep_temperature").text()));
    setLoadTimeout();
    colorsOnLoad();
}


function setLoadTimeout(){
    setTimeout('window.open(\"/\", \"_self\");', 180000);
}

function colorsOnLoad(){
    var obj = $('.loadStatus');
    var temp = $('.temperature');
    console.log(obj.text());
    if (obj.text() == '0') {
        $('#disableLoad').remove();
        obj.toggleClass('bg_green');
        temp.toggleClass('bg_green');
        obj.text('Off');
    }
    else {
        $('#enableLoad').remove();
        obj.toggleClass('bg_red');
        temp.toggleClass('bg_red');
        obj.text('On')
    }



    $('.compactHidden').hide();
    console.log("Value " +  $('#load_mode').text());
    if ( $('#load_mode').text() == "3"){
        document.body.style.backgroundColor = "#ca7887";
        $("#keep_temperature").toggleClass('bg_red');
    }
    else if ( $('#load_mode').text() == "2"){
        document.body.style.backgroundColor = "yellow";
    }
    else if ( $('#load_mode').text() == "1"){
        document.body.style.backgroundColor = "MintCream";
    }
    else{
        document.body.style.backgroundColor = "red";
    }

}

function buildContentBody(){
    //noinspection JSAnnotator
    // language=HTML
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
                <td>Current Tmp Outside</td>
                <td>
                    <table style='width: 100%;'>
                        <tr>
                            <td style='width: 60%;font-size: 48px;font-weight: bolder;vertical-align: top' rowspan='2'>&nbsp;<span id='current_temperature'></span> C</td>
                            <td style='vertical-align: bottom'>Max possible tmp is</td>
                        </tr>
                        <tr>
                            <td style='text-align: right;'>[<span id='max_temperature'></span>] C</td>
                        </tr>
                    </table>
            </tr>
            <tr class='temperature'>
                <td>Current Tmp Inside</td>
                <td>
                    <table style='width: 100%;'>
                        <tr>
                            <td style='width: 60%;font-size: 48px;font-weight: bolder;vertical-align: top' rowspan='2'>&nbsp;<span id='inside_temperature'></span> C</td>
                            <td style='vertical-align: bottom'>Max possible tmp is</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style='text-align: right;'>[<span id='max_temperature_inside'></span>] C</td>
                        </tr>
                    </table>
                    </td>
            </tr>
            <tr><td>Refresh</td>
                <td><form action='/'><input style='font-size:92px' type='submit' value='Refresh'></form></td>
            </tr>
            <tr id='keepMode'>
                <td>Keep</td>
                <td>
                    <form action='/keep'>
                        <input style='font-size:22px' type='number' step='0.1' value='22' name='temperatureKeep' id='temperatureKeep' max='50' min='10' />
                        <input style='font-size:62px' type='submit' value='Keep'/>
                    </form>
                </td>
            </tr>
            <tr id='emptyRow'>
                <td></td>
                <td>&nbsp;</td>
            </tr>
            <tr id='enableLoad'>
                <td>Enable Load</td>
                <td><form action='/el'><input style='font-size:42px' type='submit' value='Enable Load'></form></td>
            </tr>
            <tr id='disableLoad'>
                <td>Disable Load</td>
                <td><form action='/dl'><input style='font-size:42px' type='submit' value='Disable Load'></form></td>
            </tr>

            </tbody>
            </table>
        </td>
        <td>
            <table>
            <tbody>
                <tr><td>Heater MODE</td><td><div id='load_mode' class='loadMode' style='font-size: 18px;'>1</div></td></tr>
                <tr class='loadModeDescLine'><td>Load MODE Desc</td><td><div id='load_mode_description' class='loadModeDesc'>Keep TMP=<span style='font-size: 24px;font-weight: bolder;' id='keep_temperature'></span> C </div></td></tr>
                <tr><td>Load status</td><td><div id='load_status' class='loadStatus'>-1</div></td></tr>
                <tr><td>Internet access</td><td><div id='internet_access' class='internet_access'>-1</div></td></tr>
                <tr><td>Disabled by watch</td><td><div class='disabledByWatchDog'>0</div></td></tr>
                <tr class="compactHidden"><td>FlashChipId</td><td><div id='flash_chip_id'></div></td></tr>
                <tr class="compactHidden"><td>FlashChipSize</td><td><div id='flash_chip_size'></div></td></tr>
                <tr class="compactHidden"><td>FlashChipSpeed</td><td><div id='flash_chip_speed'></div></td></tr>
                <tr class="compactHidden"><td>FlashChipMode</td><td><div id='flash_chip_mode'></div></td></tr>
                <tr class="compactHidden"><td>CoreVersion/SdkVersion</td><td><span id='core_version'></span> / <span id='sdk_version'></span> </td></tr>
                <tr class="compactHidden"><td>BootVersion/BootMode</td><td><span id='boot_version'></span> / <span id='boot_mode'></span> </td></tr>
                <tr><td>CpuFreqMHz</td><td><div id='cpu_freq'></div></td></tr>
                <tr><td>macAddress</td><td><div id='mac_addr'></div></td></tr>
                <tr><td>HostName</td><td><div id='hostname'></div></td></tr>
                <tr><td>Channel/RSSI</td><td><span id='wifi_channel'></span> / <span id='rssi'></span> dbm</td></tr>
                <tr class="compactHidden"><td>SketchSize/FreeSketchSpace</td><td><span id='sketch_size'></span> / <span id='free_sketch_size'></span></td></tr>
                <tr><td>Dallas Outside Address</td><td><div id='dallas_addr'></div></td></tr>
                <tr><td>Dallas Count</td><td><div id='dallas_count'></div></td></tr>
                <tr><td>Dallas Addresses</td><td><div id='dallas_addrs' style='font-size: 10px'></div></td></tr>
                <tr><td>Outside Dallas Index</td><td><div id='outside_therm_index'></div></td></tr>
                <tr><td>Temperature Precision</td><td><div id='temperature_precision'></div></td></tr>
                <tr><td>Help</td><td><div id='help_box' style='font-size: 8px'></div></td></tr>
            </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
    `;
    return content;
}

