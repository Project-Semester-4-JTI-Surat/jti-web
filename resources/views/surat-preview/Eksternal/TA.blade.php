
<div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
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
            Perihal <span style="width:17.01pt; display:inline-block">&#xa0;</span>&#xa0; : <strong>Permohonan Ijin Survei dan Pengambilan Data</strong>
        </p>
        <p style="text-align:justify">
            &#xa0;
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>Kepada Yth.</strong>
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>Pimpinan {{$surat->nama_mitra}}</strong>
        </p>
        <p style="text-align:justify; line-height:115%">
            <strong>{{$surat->alamat_mitra}}</strong>
        </p>
        <p style="margin-left:63pt; text-align:justify">
            &#xa0;
        </p>
        <p style="text-align:justify;"><strong>&nbsp;</strong></p>
        <p style="text-align:justify;">Dalam rangka penyelenggaraan pendidikan Politeknik Negeri Jember yang berorientasi pada pendidikan profesional, mahasiswa wajib melaksanakan Tugas Akhir / Skripsi sebagai salah satu syarat kelulusan.</p>
        <p style="margin-left:63pt; text-align:justify; font-size:6pt;">&nbsp;</p>
        <p style="text-align:justify;"><span style="font-size:12pt;">Sehubungan dengan hal tersebut mohon Bapak / Ibu berkenan mengijinkan mahasiswa kami dari&nbsp;</span><strong><span style="font-size:12pt;">Program Studi {{ $surat->prodi->note }}&nbsp;</span></strong><span style="font-size:12pt;">melakukan survei guna mendapatkan data dan informasi yang kompeten</span> <span style="font-size:12pt;">sesuai dengan bidang kajiannya di Instansi / perusahaan&nbsp;</span><span style="font-size:12pt;">&nbsp;</span><span style="font-size:12pt;">yang Bapak / Ibu pimpin.</span></p>
{{--        <p style="margin-left:63pt; text-align:justify; font-size:3pt;">&nbsp;</p>--}}
        <p style="text-align:justify;">Adapun mahasiswa yang dimaksud adalah :</p>
        <p style="margin-left:63pt; text-align:justify; font-size:9pt;">&nbsp;</p>
        <table style="width:100%; border-collapse:collapse;">
            <tbody>
            <tr style="height:10.55pt;">
                <td style="width:150.35pt; border-top:0.75pt solid #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#cccccc;">
                    <p style="text-align:center;"><strong>Nama Mahasiswa</strong></p>
                </td>
                <td style="width:61.95pt; border-top:0.75pt solid #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:1.5pt double #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#cccccc;">
                    <p style="text-align:center;"><strong>NIM</strong></p>
                </td>
                <td style="width:195.15pt; border-top:0.75pt solid #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:1.5pt double #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#cccccc;">
                    <p style="text-align:center;"><strong>Judul Skripsi</strong></p>
                </td>
            </tr>
                <tr>
                    <td style="width:150.35pt; border-top:1.5pt double #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:0.75pt double #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                        <p style="text-align:center;">{{$preview_anggota->nama}}</p>
                        <p style="text-align:center;"><br></p>
                    </td>
                    <td style="width:61.95pt; border-top:1.5pt double #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                        <p style="margin-right:1.7pt; text-align:center;">{{$preview_anggota->nim}}</p>
                        <p style="margin-right:1.7pt; text-align:center;"><br></p>
                    </td>
                    <td style="border-top:1.5pt double #000000; border-right:0.75pt solid #000000; border-left:0.75pt solid #000000; border-bottom:0.75pt solid #000000; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                        <p style="margin-left:0.8pt; text-align:center;">{{$surat->judul_ta}}</p>
                        <p style="margin-right:1.7pt; text-align:center;"><br></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-left:63pt; text-align:justify; font-size:5pt;">&nbsp;</p>
        <p style="text-align:justify;">Konfirmasi kesediaan Bapak/Ibu untuk menerima ijin survey mahasiswa kami dapat disampaikan pada <strong>{{ $surat->koordinator->nama }}</strong> dengan no Hp. {{$surat->koordinator->no_hp}} selaku Koordinator Bidang Tugas Akhir/Skripsi Program Studi {{ $surat->prodi->note }} Politeknik Negeri Jember.</p>
        <p style="text-align:justify; font-size:5pt;">&nbsp;</p>
        <p style="text-align:justify;">Demikian atas kebijakan dan kerjasama yang baik dari Bapak/Ibu dalam turut serta menunjang peningkatan keterampilan anak didik kami, diucapkan terima kasih<span style="font-size:11pt;">.</span></p>
        <p style="text-align:justify">
            &#xa0;
        </p>
    </div>
   <p style="text-align:justify">
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
</div>

