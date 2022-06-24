<html>
    <head>
        <style>
            @page { margin: 0px; }
            body { margin: 0px; }
            html {
                -webkit-font-smoothing: antialiased;
                box-sizing: border-box;
                text-size-adjust: 100%;
            }
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto auto;
            }
            .col-6 {
                flex: 0 0 100%;
                max-width: 50%;
            }
            .table{
                border-collapse:collapse;
                width:100%
            }
            .table,.table td,.table th{
                border:3.5px solid #000
            }
            .no-border, .no-border td, .no-border th {
                border:0px;
            }
            .table td{
                padding:5px 10px
            }
            .padding0{
                padding:5px !important
            }
            .table-child, .table-child td{
                border:0!important;
                border-spacing:0!important;
                font-size:small
            }
            .table-child td{
                /* padding:0 5px!important */
            }
            td, th {
                vertical-align: top!important;
            }
            tbody {
                display: table-row-group;
                vertical-align: middle;
                border-color: inherit;
            }
            tr {
                display: table-row;
                vertical-align: inherit;
                border-color: inherit;
            }


            .css-isbt42 {
                box-sizing: border-box;
                display: flex;
                flex-flow: row wrap;
                margin-top: -16px;
                width: calc(100% - 16px);
                margin-left: -16px;
            }

            .css-isbt42 > .MuiGrid-item {
                padding-left: 16px;
            }
            .css-isbt42 > .MuiGrid-item {
                padding-top: 16px;
            }
            .css-q0y1mx {
                box-sizing: border-box;
                margin: 0px;
                flex-direction: row;
                flex-basis: 60%;
                -webkit-box-flex: 0;
                flex-grow: 0;
                max-width: 60%;
                text-align: center;
            }
            .css-4xkoi8 {
                box-sizing: border-box;
                margin: 0px;
                flex-direction: row;
                flex-basis: 25%;
                -webkit-box-flex: 0;
                flex-grow: 0;
                max-width: 25%;
            }
            .css-isbt42 > .MuiGrid-item {
                padding-left: 16px;
            }
            .css-isbt42 > .MuiGrid-item {
                padding-top: 16px;
            }
            .css-1pb8r2m {
                margin: 12px 0px 0px;
                font-family: arial, sans-serif;
                font-weight: 400;
                font-size: 1.1rem;
                line-height: 1.5;
            }
            .css-f21qwv {
                margin: 0px;
                font-family: arial, sans-serif;
                font-size: 1.35rem;
                line-height: 1.6;
                font-weight: 700;
                text-transform: uppercase;
            }
            .css-2lmuay {
                margin: 0px 0px 8px;
                font-family: arial, sans-serif;
                font-weight: 400;
                font-size: 1rem;
                line-height: 1.5;
            }
            .css-43cvzp {
                font-family: arial, sans-serif;
                font-size:14px;
                margin:0px;
            }
            .css-qfsmx6 {
                margin: 0px;
                font-family: arial, sans-serif;
                font-size: 0.85rem;
                /* line-height: 1.66; */
                font-weight: 700;
            }
            .css-k008qs {
                display: flex;
                margin-bottom: 4px;
            }
            /* .checkbox {
                position:relative;
                top:3px;
                user-select: none;
                width: 1em;
                height: 1em;
                display: inline-block;
                fill: currentcolor;
                flex-shrink: 0;
                transition: fill 200ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                font-size: 1.5rem;
            } */
            .chk-container {
                display: inline-block;
                position: relative;
                padding-left: 20px;
                margin-bottom: 12px;
                cursor: pointer;
                font-size: 18px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            /* Hide the browser's default checkbox */
            .chk-container input {
                position: absolute;
                opacity: 0;
                cursor: pointer;
                height: 0;
                width: 0;
            }

            /* Create a custom checkbox */
            .uncheckmark, .checkmark {
                position: absolute;
                top: 0;
                left: 0;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px black solid;
                border-radius:2px;
            }

            /* On mouse-over, add a grey background color */
            .chk-container:hover input ~ .checkmark {
                background-color: #ccc;
            }

            /* When the checkbox is checked, add a blue background */
            .chk-container input:checked ~ .checkmark {
                background-color: #002B4E;
            }

            /* Create the checkmark/indicator (hidden when not checked) */
            .checkmark:after {
                content: "";
                position: absolute;
                display: none;
            }

            /* Show the checkmark when checked */
            .chk-container input:checked ~ .checkmark:after {
                display: block;
            }

            /* Style the checkmark/indicator */
            .chk-container .checkmark:after {
                left: 4px;
                top: 0px;
                width: 6px;
                height: 11px;
                border: solid white;
                border-width: 0 2px 2px 0;
                -webkit-transform: rotate(35deg);
                -ms-transform: rotate(35deg);
                transform: rotate(35deg);
            }

            svg:not(:root) {
                overflow: hidden;
            }
            .css-1d3bbye {
                box-sizing: border-box;
                display: flex;
                flex-flow: row wrap;
                width: 100%;
            }
            .css-1qs4hzm {
                margin: 2.4px 0px 0px 8px;
                font-family: arial, sans-serif;
                font-weight: 400;
                font-size: 0.75rem;
                line-height: 1.66;
            }
            .css-k008qs {
                display: flex;
            }
            .css-tzfnf1 {
                display: flex;
                -webkit-box-align: center;
                align-items: center;
                height: 280px;
                margin-top: 2.4px;
                margin-left: 40px;
                margin-right: 40px;
            }
            .css-58hbps {
                margin: 0px;
                font-family: arial, sans-serif;
                font-weight: 400;
                font-size: 0.875rem;
                line-height: 1.43;
                white-space: pre-line;
            }

            /* -------------- */

            p {
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
            }
            h6 {
                display: block;
                font-size: 0.67em;
                margin-block-start: 2.33em;
                margin-block-end: 2.33em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                font-weight: bold;
            }

            /* 1200 */
            @media (min-width: 1200px){
                .css-4xkoi8 {
                    flex-basis: 25%;
                    -webkit-box-flex: 0;
                    flex-grow: 0;
                    max-width: 25%;
                }
                .css-q0y1mx {
                    flex-basis: 66.6667%;
                    -webkit-box-flex: 0;
                    flex-grow: 0;
                    max-width: 66.6667%;
                }
                
            }
            .css-1tqxarj {
                    flex-basis: 45.8333%;
                    -webkit-box-flex: 0;
                    flex-grow: 0;
                    max-width: 45.8333%;
                }
                .css-6dza28 {
                    flex-basis: 54.1667%;
                    -webkit-box-flex: 0;
                    flex-grow: 0;
                    max-width: 54.1667%;
                }
        </style>
    </head>
    <body>
        <div id="pdf" style="padding: 16px;">
            <div style="border: 3.5px solid rgb(0, 0, 0); border-radius: 30px;">
                <table width="90%">
                    <tr>
                        <td width="30%">
                            <img alt="Thumbnail" src="{{$img}}" width="170" style="margin-left: 25px;">
                        </td>
                        <td width="70%" align="center">
                            <p class="css-1pb8r2m">KEMENTERIAN KOPERASI DAN UKM <br>REPUBLIK INDONESIA </p>
                            <h6 class="css-f21qwv">Sekretaris Kementerian</h6>
                            <p class="css-2lmuay">LEMBAR DISPOSISI</p>
                        </td>
                    </tr>
                </table>
            </div>
            <table class="table" style="margin-top: 10px;" width="100%">
                <tbody>
                    <tr>
                        <td width="30%">
                            <span class="css-qfsmx6">KODE KEAMANAN AKSES</span>
                            @foreach($param['security'] as $k => $v)
                                <div class="css-k008qs">
                                    <label class="chk-container">
                                        <input type="checkbox" checked="checked" style="display:none">
                                        @php($cls = "uncheckmark")
                                        @if($data != null)
                                            @if($data->mail != null && $data->mail->mail_security != null && strtolower($data->mail->mail_security->param) == strtolower($v->param))
                                                @php($cls = "checkmark")
                                            @elseif($data->incoming_disposition != null && $data->incoming_disposition->mail_security != null && strtolower($data->incoming_disposition->mail_security->param) == strtolower($v->param))
                                                @php($cls = "checkmark")
                                            @elseif($data->agenda != null && $data->agenda->mail_security != null && strtolower($data->agenda->mail_security->param) == strtolower($v->param))
                                                @php($cls = "checkmark")
                                            @endif

                                        @endif
                                        <span class="{{$cls}}"></span>
                                    </label>
                                    <span class="css-1qs4hzm">
                                        {{-- {{ strtoupper($v->param) }} ({{substr($v->param, 0, 1)}}) --}}
                                        @if (($v->param == 'Rahasia')) RAHASIA (R) @endif
                                        @if (($v->param == 'Terbatas')) TERBATAS (T) @endif
                                        @if (($v->param == 'Biasa')) TERBUKA/BIASA (B) @endif
                                    </span>
                                </div>
                            @endforeach
                        </td>
                        <td colspan="2" rowspan="2" style="padding:0; margin:0;">
                            <table class="no-border">
                                <tbody>
                                    <tr>
                                        <td style="width: 135px; padding:2px 4px;">
                                            <span class="css-qfsmx6">Asal Surat</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {{$data->mail->mail_origin}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {{$data->incoming_disposition->mail_origin}}
                                                @elseif($data != null && $data->agenda != null)
                                                    {{$data->agenda->origin}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 120px; padding:2px 4px">
                                            <span class="css-qfsmx6">Nomor Surat</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {{$data->mail->mail_number}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {{$data->incoming_disposition->mail_number}}
                                                @elseif($data != null && $data->agenda != null)
                                                    {{$data->agenda->mail_number}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:2px 4px">
                                            <span class="css-qfsmx6">Hal</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {{$data->mail->regarding}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {{$data->incoming_disposition->regarding}}
                                                @elseif($data != null && $data->agenda != null)
                                                    {{$data->agenda->regarding}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:2px 4px">
                                            <span class="css-qfsmx6">No. Agenda</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {!! sprintf("%04d", $data->mail->agenda_number) !!}-{{$data->mail->mail_category_code}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {!! sprintf("%04d", $data->incoming_disposition->agenda_number) !!}-D
                                                @elseif($data != null && $data->agenda != null)
                                                    {!! sprintf("%04d", $data->agenda->agenda_number) !!}-UND
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:2px 4px">
                                            <span class="css-qfsmx6">Tanggal Surat</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {{ $date['day'][ date('w', strtotime($data->mail->mail_date)) ] }}, {{date('d', strtotime($data->mail->mail_date))}} {{ $date['month'][ (int)date('m', strtotime($data->mail->mail_date)) ] }} {{date('Y', strtotime($data->mail->mail_date))}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {{ $date['day'][ date('w', strtotime($data->incoming_disposition->mail_date)) ] }}, {{date('d', strtotime($data->incoming_disposition->mail_date))}} {{ $date['month'][ (int)date('m', strtotime($data->incoming_disposition->mail_date)) ] }} {{date('Y', strtotime($data->incoming_disposition->mail_date))}}
                                                @elseif($data != null && $data->agenda != null)
                                                    {{ $date['day'][ date('w', strtotime($data->agenda->mail_date)) ] }}, {{date('d', strtotime($data->agenda->mail_date))}} {{ $date['month'][ (int)date('m', strtotime($data->agenda->mail_date)) ] }} {{date('Y', strtotime($data->agenda->mail_date))}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:2px 4px">
                                            <span class="css-qfsmx6">Tanggal Diterima</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null && $data->mail != null)
                                                    {{ $date['day'][ date('w', strtotime($data->mail->date_received)) ] }}, {{date('d', strtotime($data->mail->date_received))}} {{ $date['month'][ (int)date('m', strtotime($data->mail->date_received)) ] }} {{date('Y', strtotime($data->mail->date_received))}}
                                                @elseif($data != null && $data->incoming_disposition != null)
                                                    {{ $date['day'][ date('w', strtotime($data->incoming_disposition->date_received)) ] }}, {{date('d', strtotime($data->incoming_disposition->date_received))}} {{ $date['month'][ (int)date('m', strtotime($data->incoming_disposition->date_received)) ] }} {{date('Y', strtotime($data->incoming_disposition->date_received))}}
                                                @elseif($data != null && $data->agenda != null)
                                                    {{ $date['day'][ date('w', strtotime($data->agenda->date_received)) ] }}, {{date('d', strtotime($data->agenda->date_received))}} {{ $date['month'][ (int)date('m', strtotime($data->agenda->date_received)) ] }} {{date('Y', strtotime($data->agenda->date_received))}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:2px 4px">
                                            <span class="css-qfsmx6">Tanggal Disposisi</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">:</span>
                                        </td>
                                        <td style="padding:2px 4px">
                                            <span class="css-43cvzp">
                                                @if($data != null)
                                                    {{ $date['day'][ date('w', strtotime($data->created_at)) ] }}, {{date('d', strtotime($data->created_at))}} {{ $date['month'][ (int)date('m', strtotime($data->created_at)) ] }} {{date('Y', strtotime($data->created_at))}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="css-qfsmx6">SIFAT URGENSI SURAT</span>
                            @foreach($param['nature'] as $k => $v)
                                <div class="css-k008qs">
                                    <label class="chk-container">
                                        <input type="checkbox" checked="checked" style="display:none">
                                        @php($cls = "uncheckmark")
                                        @if($data != null)
                                            @if($data->mail != null && $data->mail->mail_nature != null && strtolower($data->mail->mail_nature->param) == strtolower($v->param))
                                                @php($cls = "checkmark")
                                            @endif
                                            @if($data->incoming_disposition != null && $data->incoming_disposition->mail_nature != null && strtolower($data->incoming_disposition->mail_nature->param) == strtolower($v->param))
                                                @php($cls = "checkmark")
                                            @endif
                                        @endif
                                        <span class="{{$cls}}"></span>
                                    </label>
                                    <span class="css-1qs4hzm">{{ strtoupper($v->param) }}</span>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                                <?php 
                                    $_assignment = $data != null && $data->disposition_assignment != null ? $data->disposition_assignment->toArray() : [];
                                    $internalAssignment=[];
                                    $externalAssignment=[];

                                    // echo json_encode($_assignment);
                                    foreach ($_assignment as $k => $v) {
                                        if($v['receiver_id'] != null)
                                            $internalAssignment[$v['receiver_id']] = $v;
                                        if($v['receiver_id'] == null)
                                            $externalAssignment[] = $v;
                                    }
                                    $i=1;

                                    echo '<div style="display:flex">';
                                        echo '<div class="col-6">';
                                        foreach($user_disposition->toArray('') as $k => $v){
                                            $selected = array_key_exists($v['id'], $internalAssignment) ? true : false;
                                            if($i < 12) {
                                                echo '
                                                    <div class="css-k008qs">
                                                        <label class="chk-container"><input type="checkbox" checked="checked" style="display:none"><span class="'.($selected ? 'checkmark' : 'uncheckmark').'"></span></label>
                                                        <span class="css-1qs4hzm">'.$v['position_name'].'</span>
                                                    </div>
                                                ';
                                            }
                                            $i++;
                                        }
                                        echo '</div>';

                                        $i2=1;
                                        echo '<div class="col-6">';
                                            foreach($user_disposition->toArray('') as $k => $v){
                                                $selected = array_key_exists($v['id'], $internalAssignment) ? true : false;
                                                if($i2 > 11) {
                                                    echo '
                                                        <div class="css-k008qs">
                                                            <label class="chk-container"><input type="checkbox" checked="checked" style="display:none"><span class="'.($selected ? 'checkmark' : 'uncheckmark').'"></span></label>
                                                            <span class="css-1qs4hzm">'.$v['position_name'].'</span>
                                                        </div>
                                                    ';
                                                }
                                                $i2++;
                                            }
                                            if(!empty($externalAssignment[0])) {
                                                $assignment1 = !empty($externalAssignment[0]) ? $externalAssignment[0]["position_name"] : ".............................." ;
                                                echo '
                                                    <div class="css-k008qs">
                                                        <label class="chk-container"><input type="checkbox" checked="checked" style="display:none"><span class="checkmark"></span></label>
                                                        <span class="css-1qs4hzm">'. $assignment1 .'</span>
                                                    </div>
                                                ';
                                            }
                                            
                                            if(!empty($externalAssignment[1])) {
                                                $assignment2 = !empty($externalAssignment[1]) ? $externalAssignment[1]["position_name"] : ".............................." ;
                                                echo '
                                                    <div class="css-k008qs">
                                                        <label class="chk-container"><input type="checkbox" checked="checked" style="display:none"><span class="checkmark"></span></label>
                                                        <span class="css-1qs4hzm">'. $assignment2 .'</span>
                                                    </div>
                                                ';
                                            }

                                            echo '
                                                <div class="css-k008qs">
                                                    <label class="chk-container"><input type="checkbox" checked="checked" style="display:none"><span class="uncheckmark"></span></label>
                                                    <span class="css-1qs4hzm">..............................</span>
                                                </div>
                                            ';
                                        echo '</div>';
                                    echo '</div>';
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center; padding: 0px;">
                            <span class="css-qfsmx6">INSTRUKSI</span>
                        </td>
                        <td style="text-align: center; padding: 0px;">
                            <span class="css-qfsmx6">CATATAN/TANGGAL</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php 
                                $instrunction = [];
                                if($data->disposition_instruction){
                                    foreach($data->disposition_instruction as $k => $v){
                                        $instrunction[$v->instruction_id] = $v;
                                    }
                                }
                            ?>
                            @foreach($param['instruction'] as $k => $v)
                                <div class="css-k008qs">
                                    <label class="chk-container">
                                        <input type="checkbox" checked="checked" style="display:none">
                                        <span class="{!! array_key_exists($v->id, $instrunction) ? 'checkmark' : 'uncheckmark' !!}"></span>
                                    </label>
                                    <span class="css-1qs4hzm">{{ ($v->param) }}</span>
                                </div>
                            @endforeach
                        </td>
                        <td style="width: 420px;">
                            <span class="css-58hbps">{!! $data != null ? $data->description : "" !!}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>