<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <title>
    </title>
    <style>
         @media print{
            body{
                page-break-after: always;
                padding: 0 30px 0 30px;
            }
            .btn-cetak{
                display: none;
            }
            .header_tr{
                background-color:#cccccc;
            }
        }

        body {
            -webkit-print-color-adjust:exact !important;
            print-color-adjust:exact !important;
            font-family: 'Times New Roman';
            font-size: 12px
        }
        span, p {
            font-size: 12pt !important;
        }

        h3, p { margin:0pt }
        li { margin-top:0pt; margin-bottom:0pt }
        h3 { text-align:center; page-break-inside:auto; page-break-after:avoid; font-family:'Times New Roman'; font-size:10pt; font-weight:bold; color:#000000 }
        .BalloonText { font-family:Tahoma; font-size:8pt }
        .Footer { font-size:12pt }
        .Header { font-size:12pt }
        span.BalloonTextChar { font-family:Tahoma; font-size:8pt }
        span.FooterChar { font-size:12pt }
        span.HeaderChar { font-size:12pt }
        span.Hyperlink { text-decoration:underline; color:#0000ff }

    </style>
</head>
<body>
<div>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <button onclick="window.print()" class="btn-cetak">Cetak</button>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <div>
        <p style="text-align:justify; line-height:115%">
            Nomor <span style="width:17pt; display:inline-block">&#xa0;</span>&#xa0; :<span
                style="width:8.67pt; display:inline-block">&#xa0;</span>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
            &#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0; <span style="width:15pt; display:inline-block">&#xa0;</span><span
                style="width:36pt; display:inline-block">&#xa0;</span>/ PL17 / PP / {{ \Carbon\Carbon::now()->format('Y') }}
        </p>
        <p style="text-align:justify; line-height:115%">
            Lampiran&#xa0;&#xa0;&#xa0; :<span style="width:1.02pt; display:inline-block">&#xa0;</span> -
        </p>
        <p style="text-align:justify; line-height:115%">
            Perihal <span style="width:17.01pt; display:inline-block">&#xa0;</span>&#xa0; : <strong>Permohonan Ijin
                Magang</strong>
        </p>
        <p style="text-align:justify">
            &#xa0;
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>KepadaYth.</strong>
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>{{$surat->nama_mitra}}</strong>
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>{{$surat->alamat_mitra}}</strong>
        </p>
        <p style="margin-left:63pt; text-align:justify">
            &#xa0;
        </p>
        <p style="text-align:justify">
            Dalam rangka penyelenggaraan pendidikan Politeknik Negeri Jember yang berorientasi pada pendidikan vokasional,&#xa0;
            mahasiswa Politeknik Negeri Jember wajib melaksanakan Magang di perusahaan/industri/instansi dan/atau <em>strategic
                business unit</em> lainnya selama 1 semester dengan bobot 20 SKS pada semester akhir sebagai salah satu
            syarat wajib kelulusan.
        </p>
        <p style="text-align:justify; font-size:9pt">
            &#xa0;
        </p>
        <p style="text-align:justify">
            Sehubungan dengan hal tersebut, mohon dapatnya Bapak/Ibu berkenan mengijinkan beberapa&#xa0; mahasiswa kami dari&#xa0;
            Jurusan Teknologi Informasi <strong>Program Studi {{ $surat->prodi->note }} </strong>guna melaksanakan Magang di
            perusahaan yang Bapak/Ibu Pimpin dari tanggal <strong>
                @if (\Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_pelaksanaan)->translatedFormat('Y') == \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_selesai)->translatedFormat('Y'))
                {{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_pelaksanaan)->translatedFormat('d F')  }} sampai {{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_selesai)->translatedFormat('d F Y')  }}</strong> dengan &#xa0;materi

                @else
                {{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_pelaksanaan)->translatedFormat('d F Y')  }} sampai {{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_selesai)->translatedFormat('d F Y')  }}</strong> dengan &#xa0;materi

                @endif
            yang akan dipelajari sesuai disiplin ilmu diperoleh (sesuai dengan <em>Curriculum Vitae</em>).
        </p>
        <p style="text-align:justify; font-size:5pt">
            &#xa0;
        </p>
        <p style="text-align:justify">
            Adapun nama mahasiswa tersebut adalah :
        </p>
        <p style="text-align:justify; font-size:8pt">
            &#xa0;
        </p>
        @php
            $anggota = \App\Models\Anggota::where('surat_id','=',$surat->uuid)->get();
        @endphp
        <table style="border-collapse:collapse;border:none;">
            <tbody>
            <tr class="header_tr">
                <td style="width: 70.65pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top; background-color:#cccccc">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No.</span></strong></p>
                </td>
                <td style="width: 177.2pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top; background-color:#cccccc">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>Nama Mahasiswa</span></strong></p>
                </td>
                <td style="width: 202.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top; background-color:#cccccc">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>NIM</span></strong></p>
                </td>
                <td style="width: 202.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top; background-color:#cccccc">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No. Hp</span></strong></p>
                </td>
            </tr>

            @foreach($anggota as $key => $value)
                <tr>
                    <td style="width: 70.65pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $key+1 }}</span></p>
                    </td>
                    <td style="width: 177.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->nama }}</span></p>
                    </td>
                    <td style="width: 202.95pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->nim }}</span></p>
                    </td>
                    <td style="width: 202.95pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->no_hp }}</span></p>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <p style="text-align:justify; font-size:9pt">
            &#xa0;
        </p>
        <p style="text-align:justify">
            Konfirmasi kesediaan Bapak/Ibu untuk menerima Program Magang mahasiswa kami dapat disampaikan pada <strong>{{ $surat->koordinator->nama }}</strong> dengan&#xa0; No. Hp. {{ $surat->koordinator->no_hp }} selaku Koordinator Bidang Magang
            Program Studi {{ $surat->prodi->note }} Politeknik Negeri Jember.
        </p>
        <p style="text-align:justify; font-size:8pt">
            &#xa0;
        </p>
        <p style="text-align:justify">
            Demikian atas kebijakan dan kerjasama yang baik dari Bapak/Ibu dalam turut serta menunjang peningkatan
            keterampilan anak didik kami, diucapkan terima kasih.
        </p>
    </div>
    <p style="text-align:justify">
        &#xa0;
    </p> 
    <p style="text-align:justify">
        &#xa0;
    </p> 
    <p style="text-align:justify">
        &#xa0;
    </p> 
    <p style="text-align:justify">
        &#xa0;
    </p> 
    <p style="text-align:justify">
        &#xa0;
    </p> 
    <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p>
    <p style="text-align:justify">
        <span style="width:279pt; display:inline-block">&#xa0;</span>Ketua
    </p>
    <p style="text-indent:279pt; text-align:justify">
        Jurusan Teknologi Informasi,
    </p>
    <div style="  margin:1rem 10rem 1rem 0; text-align:right; ">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
        ->merge('img/polije_logo.png',.27,true)
        ->size(100)->generate(route('scanQr',$surat->uuid))) !!} ">
    </div>
    <p style="text-align:justify">
        <span style="width:279pt; display:inline-block">&#xa0;</span><strong>Hendra Yufit Riskiawan, S.Kom, M.Cs</strong>
    </p>

    <p>
        <span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
        <strong>NIP 19830203 200604 1 003</strong>
    </p>
    {{--    <p style="font-size:9pt">--}}
    {{--        <strong><span style="color:#ffffff">Tembusan Kpd Yth:</span></strong>--}}
    {{--    </p>--}}
    {{--    <p style="font-size:9pt">--}}
    {{--        <strong><span style="color:#ffffff">Ka. Badan Perencanaan Pembangunan Daerah (BAPEDA)</span></strong>--}}
    {{--    </p>--}}
    {{--    <p style="font-size:9pt">--}}
    {{--        <strong><span style="color:#ffffff">Kantor Bupati Kab. Probolingo</span></strong>--}}
    {{--    </p>--}}
   {{--    <div class="footer">--}}

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        window.print();
</script>
</html>
