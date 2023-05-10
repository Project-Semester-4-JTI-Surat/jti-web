<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Nomor : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/ PL17 / ** / 2021</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Lampiran : 1 (satu) bendel</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Perihal : <strong>Permohonan Ijin Praktik Kerja Lapangan (PKL)</strong></span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Kepada Yth.</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'><?php echo e($surat->nama_mitra); ?></span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'><?php echo e($surat->alamat_mitra); ?></span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>Di</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; Tempat</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Dalam rangka penyelenggaraan pendidikan Politeknik Negeri Jember yang berorientasi pada pendidikan vokasional, mahasiswa Politeknik Negeri Jember wajib melaksanakan Praktik Kerja Lapangan (PKL) di perusahaan/industri/instansi dan/atau strategic business unit lainnya selama 1 semester dengan bobot 20 SKS pada semester akhir sebagai salah satu syarat kelulusan.</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Sehubungan dengan hal tersebut mohon dapatnya Bapak/Ibu berkenan mengijinkan beberapa mahasiswa kami dari Jurusan Teknologi Informasi <strong> Program Studi <?php echo e($surat->prodi->note); ?></strong> guna melaksanakan Praktik Kerja Lapang (PKL) diperusahaan yang Bapak/Ibu pimpin dari tanggal <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_pelaksanaan)->translatedFormat('d F Y')); ?> sampai <?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d',  $surat->tanggal_selesai)->translatedFormat('d F Y')); ?> dengan materi yang akan dipelajari sesuai disiplin ilmu diperoleh  (sesuai dengan <em>Curriculum Vitae</em>).</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Adapun nama mahasiswa yang tersebut adalah :</span></p>
 <?php
        $anggota = \App\Models\Anggota::where('surat_id','=',$surat->uuid)->get();
    ?>
<table style="border-collapse:collapse;border:none;">
    <tbody>
        <tr>
            <td style="width: 70.65pt;border: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>No.</span></strong></p>
            </td>
            <td style="width: 177.2pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>Nama Mahasiswa</span></strong></p>
            </td>
            <td style="width: 202.95pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-family:"Times New Roman",serif;'>NIM</span></strong></p>
            </td>
        </tr>

<?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <tr>
            <td style="width: 70.65pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'><?php echo e($key+1); ?></span></p>
            </td>
            <td style="width: 177.2pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'><?php echo e($value->nama); ?></span></p>
            </td>
            <td style="width: 202.95pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0cm 5.4pt;vertical-align: top;">
                <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-family:"Times New Roman",serif;'><?php echo e($value->nim); ?></span></p>
            </td>
        </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
       
    </tbody>
</table>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Konfirmasi kesediaan Bapak/Ibu untuk menerima Program PKL mahasiswa kami dapat disampaikan pada <strong><?php echo e($surat->koordinator->nama); ?></strong> dengan No. Hp. <?php echo e($surat->koordinator->no_hp); ?> selaku Koordinator Bidang PKL Program Studi <?php echo e($surat->prodi->note); ?> Politeknik Negeri Jember.</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>Demikian atas kebijakan dan kerjasama yang baik dari Bapak/Ibu dalam turut serta menunjang peningkatan keterampilan anak didik kami, diucapkan terima kasih.</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style='font-family:"Times New Roman",serif;'>a n Direktur</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style='font-family:"Times New Roman",serif;'>Wakil Direktur Bidang Akademik</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><strong><span style='font-family:"Times New Roman",serif;'>Surateno, S.Kom, M.Kom</span></strong></p>
<p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><strong><span style='font-family:"Times New Roman",serif;'>NIP. 19790703 200312 1 001</span></strong></p>
<script>
    window.print();
</script><?php /**PATH C:\laragon\www\jti-surat\resources\views/template-surat/PK.blade.php ENDPATH**/ ?>