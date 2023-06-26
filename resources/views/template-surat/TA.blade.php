<div>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Nomor :</span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">/ PL17 / PP / 2021</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Perihal :&nbsp;</span><strong><span style="font-family:'Times New Roman';">Permohonan Ijin Survei</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><strong><span style="font-family:'Times New Roman';">Kepada Yth.</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><strong><span style="font-family:'Times New Roman';">{{ $surat->nama_mitra }}</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><strong><span style="font-family:'Times New Roman';">{{ $surat->alamat_mitra }}</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><strong><span style="font-family:'Times New Roman';">Di</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';">Tempat</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Dalam rangka penyelenggaraan pendidikan Politeknik Negeri Jember yang berorientasi pada pendidikan profesional,mahasiswa wajib melaksanakan Tugas Akhir / Skripsi sebagai  salah satu syarat kelulusan.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Sehubungan dengan hal tersebut mohon Bapak / Ibu berkenan mengijinkan mahasiswa kami dari Program Studi&nbsp;</span><strong><span style="font-family:'Times New Roman';">{{ $surat->prodi->note }}</span></strong><span style="font-family:'Times New Roman';">&nbsp;melakukan Survei guna mendapatkan datadata dan informasi yang kompeten sesuai dengan bidangkajiannya di Instansi / perusahaan yang Bapak / Ibu pimpin.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Adapun mahasiswa yang dimaksud adalah :</span></p>
    @php
        $anggota = \App\Models\Anggota::where('surat_id','=',$surat->uuid)->first();
    @endphp
    <div style="text-align:center;">
        <table cellspacing="0" cellpadding="0" style="width:361.65pt; margin-right:auto; margin-left:auto; border:0.75pt solid #000000; border-collapse:collapse;">
            <tbody>
                <tr style="border:0.75pt solid #000000;">
                    <td style="border:0.75pt solid #000000;">
                        <p style=""><strong>Nama Mahasiswa</strong></p>
                    </td>
                    <td style="border:0.75pt solid #000000;">
                        <p style=""><strong>NIM</strong></p>
                    </td>
                    <td style="border:0.75pt solid #000000;">
                        <p style=""><strong>Judul Skripsi</strong></p>
                    </td>
                </tr>
                <tr style="border:0.75pt solid #000000;">
                    <td style="border:0.75pt solid #000000;">
                        <p style="">{{ $anggota->nama }}</p>
                    </td>
                    <td style="border:0.75pt solid #000000;">
                        <p style="">{{ $anggota->nim }}</p>
                    </td>
                    <td style="border:0.75pt solid #000000;">
                        <p style="">{{ $surat->judul_ta }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Konfirmasi kesediaan Bapak/Ibu untuk menerima ijin survei mahasiswa kami dapat disampaikan pada&nbsp;</span><strong><span style="font-family:'Times New Roman';">{{ $surat->koordinator->nama }}&nbsp;</span></strong><span style="font-family:'Times New Roman';">dengan No. Hp. {{ $surat->koordinator->no_hp }}; selaku Koordinator Bidang Tugas Akhir/Skripsi Program Studi {{ $surat->prodi->note }} Politeknik Negeri Jember.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">Demikian atas kebijakan dan kerjasama yang baik dari Bapak/Ibu dalam turut serta menunjang peningkatan keterampilan anak didik kami, diucapkan terima kasih.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right;"><span style="font-family:'Times New Roman';">a n Direktur</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right;"><span style="font-family:'Times New Roman';">Wakil Direktur Bidang Akademik</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; line-height:normal;"><strong><span style="font-family:'Times New Roman';">Surateno, S.Kom, M.Kom</span></strong></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; line-height:normal;"><strong><span style="font-family:'Times New Roman';">NIP. 19790703 200312 1 001</span></strong></p>
</div>
<script>
    window.print();
</script>
