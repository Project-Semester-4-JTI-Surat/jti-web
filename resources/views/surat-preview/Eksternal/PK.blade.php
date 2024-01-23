
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
            perusahaan yang Bapak/Ibu Pimpin dari tanggal <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_pelaksanaan)->translatedFormat('d F Y')  }} sampai {{ \Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_selesai)->translatedFormat('d F Y')  }}</strong> dengan &#xa0;materi
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
            </tr>

            @foreach($preview_anggota as $key => $value)
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
