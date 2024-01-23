
<div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <div>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Nomor  : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/ PL17 / PP / {{\Carbon\Carbon::now()->format('Y')}}</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Perihal : Permohonan Ijin Survei</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Kepada Yth.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:2.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>Pimpinan {{ $surat->nama_mitra }}</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>{{ $surat->alamat_mitra }}</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>Di</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; Tempat</span></strong></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Dengan hormat,</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Sehubungan dengan adanya tugas mahasiswa dengan mata kuliah <span style="font-weight: bold">{{$surat->mata_kuliah}}</span>, maka bersama ini kami menugaskan mahasiswa  Program Studi<strong>&nbsp;{{ $surat->prodi->note }}&nbsp;</strong>Jurusan Teknologi Informasi yang namanya tersebut di bawah ini untuk melakukan survey pada perusahaan/instansi yang Bapak/Ibu pimpin.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Adapun nama-nama anggota kelompok  yang ditugaskan adalah sebagai berikut :</span></p>
        @php
            $anggota = \App\Models\Anggota::where('surat_id','=',$surat->uuid)->get();
        @endphp
        <table style="border-collapse:collapse;border:none; width: 100%">
            <tbody>
            <tr class="header_tr">
                <td style="width: 49.4pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No.</span></strong></p>
                </td>
                <td style="width: 99.2pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>Nama Mahasiswa</span></strong></p>
                </td>
                <td style="width: 70.9pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>NIM</span></strong></p>
                </td>

                <td style="width: 90.2pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No Tlp.</span></strong></p>
                </td>
            </tr>
            @foreach($preview_anggota as $key => $value)
                <tr>
                    <td style="width: 49.4pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $key+1 }}</span></p>
                    </td>
                    <td style="width: 99.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->nama }}</span></p>
                    </td>
                    <td style="width: 70.9pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->nim }}</span></p>
                    </td>

                    <td style="width: 90.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'>{{ $value->no_hp }}</span></p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Konfirmasi ijin survey mahasiswa kami dapat disampaikan  pada <strong>{{ $surat->dosen->nama }}</strong> dengan no Hp. {{$surat->dosen->no_hp}} selaku Dosen Bidang Tugas Mata Kuliah Program Studi D4 Teknik Informatika Politeknik Negeri Jember.</span></p>
        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Atas perhatian dan kerjasamanya dalam ikut peningkatan keterampilan anak didik kami, diucapkan terima kasih.</span></p>

    </div>
     <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p> <p style="text-align:justify">
        &#xa0;
    </p>
    <p style="text-align:justify">
        <span style="width:279pt; display:inline-block">&#xa0;</span>a.n Ketua
    </p>
    <p style="text-indent:279pt; text-align:justify">
        Jurusan Teknologi Informasi,
    </p>
    <div style="  margin:1rem 10rem 1rem 0; text-align:right;">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
        ->merge(asset('img/polije_logo.png'), .27, true)
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
</div>
