<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8"/>
    <title>
    </title>
    <style>
        @media print{
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
            font-size: 14px
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
    <button onclick="window.print()" class="btn-cetak">Cetak</button>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Nomor : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/ PL17 / PP / {{\Carbon\Carbon::now()->format('Y')}}</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Perihal : Permohonan Ijin Survei</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Kepada Yth.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>{{ $surat->nama_mitra }}&nbsp;</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>{{ $surat->alamat_mitra }}</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>Di</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; Tempat</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Dengan hormat,</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Sehubungan dengan adanya tugas mahasiswa maka bersama ini kami menugaskan mahasiswa Program Studi Teknik Informatika Jurusan Teknologi Informasi yang namanya tersebut di bawah ini untuk melakukan survey pada perusahaan/instansi yang Bapak/Ibu pimpin.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Adapun nama-nama anggota kelompok yang ditugaskan adalah sebagai berikut :</span></p>
        @php
            $anggota = \App\Models\Anggota::where('surat_id','=',$surat->uuid)->first();
        @endphp
        <table style="border-collapse:collapse;border:none;">
            <tbody>
            <tr class="header_tr">
                <td style="width: 28.1pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No.</span></strong></p>
                </td>
                <td style="width: 155.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>Nama Mahasiswa</span></strong></p>
                </td>
                <td style="width: 70.85pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>NIM</span></strong></p>
                </td>
                <td style="width: 106.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>Jurusan / Prodi</span></strong></p>
                </td>
                <td style="width: 89.35pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No Tlp.</span></strong></p>
                </td>
            </tr>
            <tr>
                <td style="width: 28.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>1</span></p>
                </td>
                <td style="width: 155.95pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $anggota->nama }}</span></p>
                </td>
                <td style="width: 70.85pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $anggota->nim }}</span></p>
                </td>
                <td style="width: 106.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>Jurusan Teknologi Informasi / {{ $anggota->prodi->keterangan }}</span></p>
                </td>
                <td style="width: 89.35pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $anggota->no_hp }}</span></p>
                </td>
            </tr>
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Konfirmasi ijin survey mahasiswa kami dapat disampaikan pada {{ $surat->koordinator->nama }} dengan no Hp. {{$surat->dosen->no_hp}}{{ $surat->koordinator->no_hp }} Selaku Dosen Bidang Tugas Mata Kuliah Program Studi {{ $anggota->prodi->note }} Politeknik Negeri Jember.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Atas perhatian dan kerjasamanya dalam ikut peningkatan keterampilan anak didik kami, diucapkan terima kasih.</span></p>

    </div>
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
    </p> <p style="text-align:justify">
        &#xa0;
    </p>
    <p style="text-align:justify">
        <span style="width:279pt; display:inline-block">&#xa0;</span>a.n Direktur
    </p>
    <p style="text-indent:279pt; text-align:justify">
        Wakil Direktur Bidang Akademik,
    </p>
    <p style="text-align:justify">
        &#xa0;
    </p>
    <p style="text-align:justify">
        &#xa0;
    </p><p style="text-align:justify">
        &#xa0;
    </p><p style="text-align:justify">
        &#xa0;
    </p>
    <p style="text-align:justify">
        <span style="width:279pt; display:inline-block">&#xa0;</span><strong>Surateno, S.Kom, M.Kom</strong>
    </p>
    <p>
        <span style="width:36pt; display:inline-block">&#xa0;</span><span style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span><span
            style="width:36pt; display:inline-block">&#xa0;</span>&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;&#xa0;
        <strong>NIP 19790703 200312 1 001</strong>
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
    (function() {
        var beforePrint = function() {

        };
        var afterPrint = function() {
            alert("Anda akan diarahkan ke halaman dashboard");
            window.location="{{route('mahasiswa.dashboard')}}";
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');
            mediaQueryList.addListener(function(mql) {
                if (mql.matches) {
                    beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;
    }());
</script>
</html>
