-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2025 pada 15.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karierku_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_guru_bk`
--

CREATE TABLE `tabel_guru_bk` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `riwayat_pendidikan` text DEFAULT NULL,
  `tentang_diri` text DEFAULT NULL,
  `spesialisasi` varchar(150) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL COMMENT 'Path ke file gambar',
  `no_wa` varchar(20) DEFAULT NULL,
  `jadwal_konseling` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_guru_bk`
--

INSERT INTO `tabel_guru_bk` (`id`, `nama_guru`, `ttl`, `jabatan`, `riwayat_pendidikan`, `tentang_diri`, `spesialisasi`, `foto_profil`, `no_wa`, `jadwal_konseling`) VALUES
(1, 'Ayu Esa Mahesti, S.Pd.', 'Lamongan, 1 Januari 1983', 'Guru BK', 'S1 Bimbingan Konseling Universitas Negeri Malang', 'Hai, saya Ayu Esa Mahesti lulusan dari program studi Bimbingan Konseling Universitas Negeri Malang. Saya adalah seorang pendidik yang berprofesi sebagai guru Bimbingan Konseling (BK) di SMA. Dalam menjalankan peran sebagai guru BK, saya memiliki komitmen untuk mendampingi peserta didik agar mampu mengenali potensi dirinya, memahami tantangan yang dihadapinya serta membantu peserta didik dalam mengambil keputusan yang tepat untuk masa depan.\nSetiap peserta didik memiliki keunikan masing-masing. Oleh karena itu saya selalu berupaya menciptakan layanan yang inklusif dan responsif terhadap kebutuhan peserta didik. Saya memberikan layanan konseling individu, kelompok dan bimbingan klasikal dengan pendekatan yang empatik, komunikatif serta berbasis nilai-nilai sosial dan emosional.\nSebagai guru BK saya tidak hanya menjadi pendengar, tetapi jg fasilitator perubahan dan pengembangan diri peserta didik. Saya aktif menjalin kolaborasi dengan guru mata pelajaran, wali kelas dan orang tua dalam rangka membentuk lingkungan belajar yang sehat dan mendukung tumbuh kembang peserta didik.\nDalam setiap langkah saya selalu belajar dan mengevaluasi diri untuk terus berkembang dan beradaptasi, bisa memberikan pelayanan terbaik yang memberi dampak positif bagi peserta didik dan lingkungan sekolah.', NULL, 'ayu_esa.jpg', '6285733778500', NULL),
(2, 'Herni Sa\'adah, S.Pd', 'Lamongan, 25 November 1986', 'Guru BK', 'S.1 Bimbingan Konseling', 'Saya, Herni Saadah, lahir pada tanggal 25 November 1986 dan saat ini berusia 39 tahun. Saya adalah individu yang dinamis, antusias, dan memiliki ketertarikan besar terhadap pengembangan diri serta eksplorasi berbagai pengalaman baru.\nMemiliki hobi traveling dan menikmati kuliner, saya percaya bahwa setiap perjalanan dan cita rasa baru memberikan pelajaran berharga dan memperkaya sudut pandang hidup. Saya juga memiliki minat dalam bidang musik dan eksplorasi hal-hal baru, yang saya yakini dapat mendukung kreativitas serta keseimbangan dalam kehidupan pribadi maupun profesional.\nDengan semangat belajar yang tinggi dan keterbukaan terhadap perubahan, saya berkomitmen untuk terus berkembang dan memberikan kontribusi positif di setiap lingkungan saya berada', NULL, 'herni_saadah.jpg', '6285815036652', NULL),
(3, 'Siti Tanmiyah Chasanah, S.Psi.,Gr', 'Lamongan, 2 Feb 1982', 'Guru BK (ASN)', '- Sarjana Psikologi (S1) di Universitas 17 Agustus Surabaya\n- Pendidikan Bimbingan dan Konseling di Universitas Darul Ulum Jombang\n- Pendidikan Profesi di Universitas Negeri Surabaya', 'Hai, Saya Ibu Siti Tanmiyah chasanah\nSaat ini saya berprofesi sebagai Guru pembimbing (BK) di SMA N 1 BABAT.\nSaya berkomitmen untuk membantu individu, dan komunitas dalam memahami dan mengatasi masalah psikologis mereka. Sekaligus menjadi pendamping mereka dalam memahami setiap keresahan, ketakutan,harapan ataupun cita² mereka.\nSaya percaya bahwa setiap anak/ orang memiliki potensi untuk tumbuh dan berkembang, dan saya ingin menjadi bagian dari perjalanan mereka.\nSaya adalah orang yang suka berkenalan dengan orang-orang baru dan beradaptasi dengan lingkungan baru. Saya percaya bahwa setiap interaksi dengan orang lain dapat membawa pembelajaran dan pengalaman baru.\nSebagai Guru BK profesional, Saya juga memperkaya diri saya dengan wawasan baru dan pendekatan yg inovatif agar mampu memberikan perspektif yg beragam sehingga mampu memberikan layanan bimbingan ataupun konseling yg relevan dan up to date.', NULL, 'siti_tanmiyah.jpg', '6282245724385', NULL),
(4, 'Bambang Siswanto, S.Pd.', 'Lamongan, 1982', 'Guru BK', 'S1 Bimbingan Konseling Universitas Darul Ulum Jombang', 'Saya Siswanto, seorang konselor profesional lulusan Universitas Darul Ulum Jombang, Fakultas Keguruan dan Ilmu Pendidikan, Prodi Bimbingan dan Konseling. Lahir di Lamongan pada tahun 1982, saya memiliki komitmen dalam mendampingi individu untuk mengembangkan potensi diri, mengelola emosi, dan menemukan solusi atas berbagai tantangan kehidupan.\nDengan pendekatan yang empatik dan berorientasi pada klien, saya berfokus pada layanan konseling yang mendukung kesehatan mental dan kesejahteraan psikologis secara menyeluruh. Saya percaya bahwa setiap individu memiliki kekuatan untuk berubah dan berkembang, dan tugas saya adalah membantu mereka menemukan kekuatan tersebut.', NULL, 'bambang_siswanto.jpg', '6281230772707', NULL),
(5, 'Brado Augustta Gitna', 'Lamongan, 1 Agustus 1999', 'GTT', 'Sarjana (S1) di Universtias Negeri Surabaya dan melanjutkan ke jenjang Profesi di Universitas Adi Buana Surabaya', 'Hai,saya Brado Augustta Gitna lahir di Lamongan, Jawa Timur, dan saat ini mengabdikan diri sebagai GTT di bidang Bimbingan dan Konseling (BK). saya telah menempuh pendidikan hingga meraih gelar Sarjana (S1) di Universtias Negeri Surabaya dan melanjutkan ke jenjang Profesi di Universitas Adi Buana Surabaya, membekali diri saya dengan ilmu dan keterampilan yang mendalam di bidang pendidikan serta konseling. Sebagai seorang guru BK muda, Saya memiliki ketertarikan yang besar terhadap dinamika dunia remaja, khususnya Generasi Z dan Generasi Alfa. saya menyadari bahwa kedua generasi ini tumbuh dalam era digital yang serba cepat, penuh tantangan, dan memiliki pola pikir yang berbeda dibandingkan generasi sebelumnya. Karena itulah, saya selalu berusaha memperkaya diri dengan wawasan baru dan pendekatan yang inovatif agar mampu memberikan layanan bimbingan dan konseling yang relevan dan efektif. Bagi saya, menjadi guru BK bukan hanya soal membantu siswa menyelesaikan masalah, tetapi juga menjadi pendamping yang memahami setiap keresahan, harapan, dan potensi yang dimiliki peserta didik. saya berkomitmen untuk menciptakan lingkungan sekolah yang nyaman, inklusif, dan mendukung perkembangan karakter serta kesehatan mental siswa. Dengan semangat yang tinggi, sayaterus belajar dan mengikuti perkembangan isu-isu kontemporer yang memengaruhi kehidupan generasi muda, mulai dari tantangan kesehatan mental, pengaruh media sosial, hingga perubahan nilai sosial di era modern. saya berharap dapat berkontribusi nyata dalam membentuk generasi penerus bangsa yang lebih tangguh, berkarakter, dan mampu menghadapi perubahan zaman.', NULL, 'brado_augustta.jpg', '62895369504030', NULL),
(6, 'Shofi Auliyah Wardah, S.Psi', 'Lamongan, 7 Februari 1996', 'Guru BK', 'S1 Psikologi UIN Sunan Ampel', 'Hai saya Shofi Auliyah Wardah Lahir pada 7 Februari 1996, saya adalah seorang Guru Bimbingan dan Konseling (BK) yang memiliki latar belakang pendidikan Psikologi dari UIN Sunan Ampel Surabaya. Selama kurang lebih 7 tahun, saya telah mengabdikan diri sebagai guru BK di SMAN 1 Babat, mendampingi peserta didik tingkat SMA dalam mengatasi berbagai tantangan akademik, emosional, sosial, dan pribadi.\nSebagai guru BK bersertifikasi, saya berkomitmen untuk terus mengembangkan diri secara profesional dan memberikan layanan bimbingan yang berorientasi pada kebutuhan siswa. Dalam 2 tahun terakhir, saya juga telah diangkat sebagai ASN PPPK, yang semakin mengukuhkan peran saya dalam memberikan kontribusi nyata di dunia pendidikan, khususnya dalam bidang konseling dan pengembangan karakter siswa.\nDengan pendekatan yang humanis, empatik, dan berbasis psikologi perkembangan, saya percaya bahwa setiap peserta didik memiliki potensi unik yang perlu diarahkan, didukung, dan dikembangkan secara optimal.', NULL, 'shofi_auliyah.jpg', '6289677161466', NULL),
(7, 'Sutam Bayu Arirahmanto, S.Pd., Gr.', 'Lamongan, 31 Desember 1993', 'Guru BK (ASN) / Waka Kurikulum', 'UNIVERSITAS NEGERI SURABAYA\nUNIVERSITAS PGRI MADIUN', 'Hi, Guys ! Saya Bapak Sutam Bayu Arirahmanto. Biasa dipanggil Pak Bay atau Pak B. Saat ini bekerja sebagai seorang guru BK dan diberi amanah sebagai Wakil Kepala Sekolah bidang Kurikulum Oleh Kepala Sekolah SMA Negeri 1 Babat.\nSaya adalah orang yang humble, suka bercanda dan salah satu guru yang termasuk paling perfectsionis dalam segala hal. Baik itu dalam BK maupun sebagai Kuikulum. Dalam peran saya sebagai guru BK, saya berkomitmen untuk mendampingi siswa dalam pengembangan potensi diri, pemahaman jati diri, serta perencanaan masa depan yang sesuai dengan minat dan kemampuan mereka.\nSebagai Wakil Kepala Sekolah Bidang Kurikulum, saya bertanggung jawab mengoordinasikan perencanaan, pelaksanaan, dan evaluasi program pembelajaran di sekolah. Saya aktif mendorong peningkatan mutu pendidikan melalui penguatan kurikulum, integrasi teknologi pembelajaran, dan kolaborasi antarstakeholder sekolah. Dengan mengedepankan pendekatan yang humanis dan solutif, saya berupaya menciptakan lingkungan belajar yang kondusif dan adaptif terhadap perkembangan zaman.', NULL, 'sutam_bayu.jpg', '6281391743292', NULL),
(8, 'Ika Novita Ayuningtyas, S.Pd., M.Psi.', 'Data tidak tersedia', 'Guru Bimbingan dan Konseling / Koordinator BK', 'S1 Psikologi dan Bimbingan Konseling, S2 Psikologi', 'Saya, Ika Novita Ayuningtyas, S.Pd., M.Psi., adalah guru sekaligus Koordinator Bimbingan dan Konseling di SMA Negeri 1 Babat. Saya telah mengabdi di dunia pendidikan lebih dari 10 tahun, dengan pengalaman mendampingi peserta didik dari berbagai latar belakang.\nPerjalanan akademik saya dimulai dari S1 Psikologi dan Bimbingan Konseling, kemudian saya melanjutkan pendidikan S2 Psikologi untuk memperdalam kompetensi dalam konseling. Selain itu, saya juga aktif mengikuti berbagai pelatihan, seminar, dan program pengembangan profesional yang menghasilkan banyak sertifikat sebagai bukti peningkatan kapasitas diri di bidang pendidikan dan konseling.\nBagi saya, menjadi guru sekaligus Koordinator BK bukan hanya sebatas memberikan arahan, tetapi juga mendampingi, memahami, serta menumbuhkan potensi terbaik setiap siswa. Dengan pengalaman, ilmu, dan keterampilan yang saya miliki, saya berkomitmen memberikan layanan konseling yang menyeluruh— mencakup aspek akademik, pribadi, sosial, maupun karier—agar tercipta lingkungan sekolah yang kondusif, sehat, dan mendukung perkembangan peserta didik secara optimal.', NULL, 'ika_novita.jpg', '6281331902620', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_informasi`
--

CREATE TABLE `tabel_informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_informasi`
--

INSERT INTO `tabel_informasi` (`id`, `judul`, `isi`, `waktu_dibuat`) VALUES
(1, 'LOKER', 'coba saja ini', '2025-10-02 23:50:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jawaban_pengguna`
--

CREATE TABLE `tabel_jawaban_pengguna` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `waktu_menjawab` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_jawaban_pengguna`
--

INSERT INTO `tabel_jawaban_pengguna` (`id`, `id_pengguna`, `id_pertanyaan`, `waktu_menjawab`) VALUES
(88, 1, 1, '2025-10-02 13:02:23'),
(89, 1, 3, '2025-10-02 13:02:23'),
(90, 1, 5, '2025-10-02 13:02:23'),
(91, 1, 10, '2025-10-02 13:02:23'),
(92, 1, 14, '2025-10-02 13:02:23'),
(93, 1, 15, '2025-10-02 13:02:23'),
(94, 1, 4, '2025-10-02 13:02:23'),
(95, 1, 11, '2025-10-02 13:02:23'),
(96, 1, 13, '2025-10-02 13:02:23'),
(97, 1, 19, '2025-10-02 13:02:23'),
(98, 1, 20, '2025-10-02 13:02:23'),
(99, 1, 21, '2025-10-02 13:02:23'),
(100, 1, 22, '2025-10-02 13:02:23'),
(101, 1, 23, '2025-10-02 13:02:23'),
(102, 1, 24, '2025-10-02 13:02:23'),
(103, 1, 25, '2025-10-02 13:02:23'),
(104, 1, 28, '2025-10-02 13:02:23'),
(105, 1, 29, '2025-10-02 13:02:23'),
(106, 1, 30, '2025-10-02 13:02:23'),
(107, 1, 31, '2025-10-02 13:02:23'),
(108, 1, 32, '2025-10-02 13:02:23'),
(109, 1, 33, '2025-10-02 13:02:23'),
(110, 1, 34, '2025-10-02 13:02:23'),
(111, 1, 36, '2025-10-02 13:02:23'),
(112, 1, 37, '2025-10-02 13:02:23'),
(113, 1, 38, '2025-10-02 13:02:23'),
(114, 1, 42, '2025-10-02 13:02:23'),
(115, 1, 43, '2025-10-02 13:02:23'),
(116, 1, 44, '2025-10-02 13:02:23'),
(117, 1, 54, '2025-10-02 13:02:23'),
(118, 1, 55, '2025-10-02 13:02:23'),
(119, 1, 56, '2025-10-02 13:02:23'),
(120, 1, 57, '2025-10-02 13:02:23'),
(121, 1, 58, '2025-10-02 13:02:23'),
(122, 1, 62, '2025-10-02 13:02:23'),
(123, 1, 63, '2025-10-02 13:02:23'),
(124, 1, 64, '2025-10-02 13:02:23'),
(125, 1, 65, '2025-10-02 13:02:23'),
(126, 1, 66, '2025-10-02 13:02:23'),
(127, 1, 69, '2025-10-02 13:02:23'),
(128, 1, 70, '2025-10-02 13:02:23'),
(129, 1, 72, '2025-10-02 13:02:23'),
(130, 1, 73, '2025-10-02 13:02:23'),
(131, 1, 74, '2025-10-02 13:02:23'),
(132, 1, 75, '2025-10-02 13:02:23'),
(133, 1, 79, '2025-10-02 13:02:23'),
(134, 1, 82, '2025-10-02 13:02:23'),
(135, 1, 83, '2025-10-02 13:02:23'),
(136, 1, 85, '2025-10-02 13:02:23'),
(137, 1, 86, '2025-10-02 13:02:23'),
(138, 1, 87, '2025-10-02 13:02:23'),
(139, 1, 88, '2025-10-02 13:02:23'),
(140, 1, 90, '2025-10-02 13:02:23'),
(141, 1, 91, '2025-10-02 13:02:23'),
(142, 1, 92, '2025-10-02 13:02:23'),
(143, 1, 93, '2025-10-02 13:02:23'),
(144, 1, 94, '2025-10-02 13:02:23'),
(145, 1, 95, '2025-10-02 13:02:23'),
(146, 1, 96, '2025-10-02 13:02:23'),
(147, 1, 97, '2025-10-02 13:02:23'),
(148, 1, 100, '2025-10-02 13:02:23'),
(149, 1, 103, '2025-10-02 13:02:23'),
(150, 1, 104, '2025-10-02 13:02:23'),
(151, 1, 107, '2025-10-02 13:02:23'),
(152, 1, 108, '2025-10-02 13:02:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jurnal`
--

CREATE TABLE `tabel_jurnal` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi_jurnal` text NOT NULL,
  `jenis` enum('catatan','todolist') NOT NULL DEFAULT 'catatan',
  `status_todolist` enum('belum_selesai','selesai') DEFAULT NULL,
  `waktu_pengingat` datetime DEFAULT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jurusan`
--

CREATE TABLE `tabel_jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe_relevan` varchar(20) NOT NULL COMMENT 'Contoh: R,I,S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_jurusan`
--

INSERT INTO `tabel_jurusan` (`id`, `nama_jurusan`, `deskripsi`, `tipe_relevan`) VALUES
(1, 'Teknik Mesin', '', 'R'),
(2, 'Teknik Elektro', '', 'R'),
(3, 'Teknik Sipil', '', 'R'),
(4, 'Kehutanan', '', 'R'),
(5, 'Pertanian', '', 'R'),
(6, 'Arsitektur', '', 'R,A'),
(7, 'Pendidikan Vokasi (SMK)', '', 'R'),
(8, 'Ilmu Keolahragaan', '', 'R'),
(9, 'Kedokteran', '', 'I'),
(10, 'Biologi', '', 'I'),
(11, 'Kimia', '', 'I'),
(12, 'Fisika', '', 'I'),
(13, 'Matematika', '', 'I'),
(14, 'Statistika', '', 'I,C'),
(15, 'Ilmu Komputer', '', 'I,R'),
(16, 'Psikologi', '', 'I,S'),
(17, 'Riset', '', 'I'),
(18, 'Seni Rupa', '', 'A'),
(19, 'Desain Grafis', '', 'A'),
(20, 'Desain Interior', '', 'A'),
(21, 'Desain Produk', '', 'A'),
(22, 'Musik', '', 'A'),
(23, 'Teater', '', 'A'),
(24, 'Jurnalistik', '', 'A,E'),
(25, 'Sastra', '', 'A'),
(26, 'Bimbingan dan Konseling', '', 'S'),
(27, 'Ilmu Komunikasi', '', 'S,E'),
(28, 'Pendidikan', '', 'S'),
(29, 'Kesehatan Masyarakat', '', 'S'),
(30, 'Keperawatan', '', 'S'),
(31, 'Ilmu Politik', '', 'S,E'),
(32, 'Manajemen', '', 'E'),
(33, 'Bisnis', '', 'E'),
(34, 'Hukum', '', 'E,I'),
(35, 'Hubungan Internasional', '', 'E,S'),
(36, 'Pemasaran', '', 'E'),
(37, 'Akuntansi', '', 'C'),
(38, 'Administrasi', '', 'C'),
(39, 'Ilmu Perpustakaan', '', 'C'),
(40, 'Manajemen Perkantoran', '', 'C'),
(41, 'Sistem Informasi', '', 'C,I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_karier`
--

CREATE TABLE `tabel_karier` (
  `id` int(11) NOT NULL,
  `nama_karier` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe_relevan` varchar(20) NOT NULL COMMENT 'Contoh: R,I,S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_karier`
--

INSERT INTO `tabel_karier` (`id`, `nama_karier`, `deskripsi`, `tipe_relevan`) VALUES
(1, 'Insinyur', '', 'R'),
(2, 'Teknisi Komputer', '', 'R'),
(3, 'Teknisi Listrik', '', 'R'),
(4, 'Teknisi Mekanik', '', 'R'),
(5, 'Petani', '', 'R'),
(6, 'Pilot', '', 'R'),
(7, 'Polisi', '', 'R'),
(8, 'Tentara', '', 'R'),
(9, 'Koki', '', 'R'),
(10, 'Ahli Konstruksi', '', 'R'),
(11, 'Ilmuwan Peneliti', '', 'I'),
(12, 'Dokter', '', 'I'),
(13, 'Ahli Bedah', '', 'I'),
(14, 'Apoteker', '', 'I'),
(15, 'Analis Data', '', 'I,C'),
(16, 'Programmer', '', 'I,R'),
(17, 'Arkeolog', '', 'I'),
(18, 'Ahli Forensik', '', 'I'),
(19, 'Dosen', '', 'I,S'),
(20, 'Seniman', '', 'A'),
(21, 'Desainer', '', 'A'),
(22, 'Penulis', '', 'A'),
(23, 'Jurnalis', '', 'A'),
(24, 'Editor', '', 'A'),
(25, 'Musisi', '', 'A'),
(26, 'Aktor', '', 'A'),
(27, 'Sutradara', '', 'A'),
(28, 'Fotografer', '', 'A'),
(29, 'Guru', '', 'S'),
(30, 'Konselor', '', 'S'),
(31, 'Psikolog', '', 'S'),
(32, 'Perawat', '', 'S'),
(33, 'Terapis', '', 'S'),
(34, 'Pekerja Sosial', '', 'S'),
(35, 'Pemandu Wisata', '', 'S,E'),
(36, 'Manajer Sumber Daya Manusia', '', 'S,E'),
(37, 'Pengusaha', '', 'E'),
(38, 'Manajer', '', 'E'),
(39, 'Pengacara', '', 'E,I'),
(40, 'Politisi', '', 'E'),
(41, 'Agen Real Estate', '', 'E'),
(42, 'Sales', '', 'E'),
(43, 'Manajer Pemasaran', '', 'E'),
(44, 'Akuntan', '', 'C'),
(45, 'Pegawai Bank', '', 'C'),
(46, 'Resepsionis', '', 'C'),
(47, 'Pustakawan', '', 'C'),
(48, 'Sekretaris', '', 'C'),
(49, 'Analis Keuangan', '', 'C,I'),
(50, 'Petugas Arsip', '', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pengguna`
--

CREATE TABLE `tabel_pengguna` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('siswa','bk') NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`id`, `nama_lengkap`, `nis`, `no_hp`, `email`, `password`, `role`) VALUES
(1, 'ADMINISTRATOR', '101010', '022131232', 'adminbk@gmail.com', '$2y$10$ll60u8RrCBFQ/RUYPAZVRehjFUdIDSA1mYCtB8nbKkAQ0Bzo8n68.', 'bk'),
(2, 'azam', '12345', '08156789234', 'azam@gmail.com', '$2y$10$oGpnn/X5GiBw6QQSRhJiqe7mRMfI0JAcy/.lU61h8ktsShpLB5uR6', 'siswa'),
(3, 'Deswita Kirana Putri', '54321', '0859123456', 'deswita@gmail.com', '$2y$10$vSmpLBBPJ7oPRGsAvmXw5.DP/AhUkNK28v.y0h/X2iz0aSnrODZbC', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pertanyaan`
--

CREATE TABLE `tabel_pertanyaan` (
  `id` int(11) NOT NULL,
  `teks_pertanyaan` text NOT NULL,
  `kategori` varchar(1) NOT NULL COMMENT 'R, I, A, S, E, atau C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_pertanyaan`
--

INSERT INTO `tabel_pertanyaan` (`id`, `teks_pertanyaan`, `kategori`) VALUES
(1, 'Saya suka memperbaiki alat-alat listrik.', 'R'),
(2, 'Saya suka memperbaiki motor.', 'R'),
(3, 'Saya suka memperbaiki peralatan mekanik.', 'R'),
(4, 'Saya suka menggunakan perkakas bengkel dan mesin.', 'R'),
(5, 'Saya mampu membuat gambar dengan skala.', 'R'),
(6, 'Saya mampu menggunakan peralatan mesin (misal bor listrik atau mesin jahit).', 'R'),
(7, 'Saya mampu melakukan perbaikan kecil pada alat listrik.', 'R'),
(8, 'Saya mampu melakukan perbaikan kecil pada Pipa air, keran, dll', 'R'),
(9, 'Saya tertarik menjadi mekanik pesawat terbang.', 'R'),
(10, 'Saya tertarik menjadi penanggung jawab keamanan.', 'R'),
(11, 'Saya tertarik menjadi mekanik/montir mobil.', 'R'),
(12, 'Saya tertarik menjadi pengrajin kayu.', 'R'),
(13, 'Saya tertarik menjadi spesialis perikanan/margasatwa.', 'R'),
(14, 'Saya tertarik menjadi operator alat-alat berat.', 'R'),
(15, 'Saya tertarik menjadi pengawas konstruksi bangunan.', 'R'),
(16, 'Saya tertarik menjadi pengemudi bis.', 'R'),
(17, 'Saya tertarik menjadi insinyur otomotif.', 'R'),
(18, 'Saya tertarik menjadi ahli mesin.', 'R'),
(19, 'Saya suka membaca buku ilmiah atau majalah ilmiah.', 'I'),
(20, 'Saya suka bekerja di laboratorium.', 'I'),
(21, 'Saya suka mengerjakan suatu proyek ilmiah.', 'I'),
(22, 'Saya suka mempelajari suatu teori ilmiah.', 'I'),
(23, 'Saya suka membaca mengenai topic khusus atau keinginan sendiri.', 'I'),
(24, 'Saya suka menerapkan matematika dalam masalah praktis.', 'I'),
(25, 'Saya mampu melakukan percobaan atau penelitian ilmiah.', 'I'),
(26, 'Saya mampu memprogram komputer untuk pelajari masalah ilmiah', 'I'),
(27, 'Saya mampu menginterpretasikan rumus kimia sederhana.', 'I'),
(28, 'Saya mampu mengerti mengapa satelit buatan manusia tidak jatuh ke bumi.', 'I'),
(29, 'Saya mampu menyebutkan tiga makanan yang memiliki protein tinggi.', 'I'),
(30, 'Saya tertarik menjadi ahli biologi/hayati.', 'I'),
(31, 'Saya tertarik menjadi ahli astronomi/bintang.', 'I'),
(32, 'Saya tertarik menjadi teknisi laboratorium medis.', 'I'),
(33, 'Saya tertarik menjadi ahli kimia.', 'I'),
(34, 'Saya tertarik menjadi ilmuwan peneliti.', 'I'),
(35, 'Saya tertarik menjadi ahli geologi.', 'I'),
(36, 'Saya tertarik menjadi pekerja riset ilmiah', 'I'),
(37, 'Saya suka membuat sketsa, menggambar atau melukis.', 'A'),
(38, 'Saya suka menjadi pemain dalam kelompok musik, okestra, atau teater.', 'A'),
(39, 'Saya suka merancang perabotan, pakaian atau poster.', 'A'),
(40, 'Saya suka bermain dalam suatu band, kelompok, atau orchestra.', 'A'),
(41, 'Saya suka memainkan alat musik.', 'A'),
(42, 'Saya suka menulis untuk suatu majalah atau koran.', 'A'),
(43, 'Saya suka membuat lukisan atau foto orang.', 'A'),
(44, 'Saya suka menulis novel atau cerita.', 'A'),
(45, 'Saya suka membaca atau menulis puisi.', 'A'),
(46, 'Saya mampu memainkan alat musik.', 'A'),
(47, 'Saya mampu bermain dalam drama.', 'A'),
(48, 'Saya mampu menginterpretasikan cerita atau bahan bacaan.', 'A'),
(49, 'Saya mampu membuat sketsa orang sehingga dapat dikenali.', 'A'),
(50, 'Saya mampu melukis atau membuat patung.', 'A'),
(51, 'Saya tertarik menjadi pemain musik.', 'A'),
(52, 'Saya tertarik menjadi penulis novel.', 'A'),
(53, 'Saya tertarik menjadi aktor/aktris,', 'A'),
(54, 'Saya tertarik menjadi wartawan.', 'A'),
(55, 'Saya suka bertemu dengan pengamat sosial atau pendidikan.', 'S'),
(56, 'Saya suka bekerja untuk palang merah sebagai relawan.', 'S'),
(57, 'Saya suka membantu orang lain dengan masalah pribadinya.', 'S'),
(58, 'Saya suka menjaga/mengurus dan mengawasi anakanak.', 'S'),
(59, 'Saya suka mempelajari kenakalan remaja.', 'S'),
(60, 'Saya mampu mudah bicara dengan semua orang.', 'S'),
(61, 'Saya mampu memimpin diskusi kelompok.', 'S'),
(62, 'Saya mampu pandai dalam menjelaskan sesuatu kepada orang lain.', 'S'),
(63, 'Saya mampu berpartisipasi dalam pencarian dana atau amal.', 'S'),
(64, 'Saya mampu mengajar anak-anak dengan mudah.', 'S'),
(65, 'Saya mampu mengajar orang dewasa dengan mudah.', 'S'),
(66, 'Saya mampu pandai dalam menolong orang lain yang sedang bingung atau bermasalah.', 'S'),
(67, 'Saya mampu dalam menghibur dan menemani orang yang lebih tua dari saya.', 'S'),
(68, 'Saya mampu orang mencari saya untuk menceritakan masalah mereka.', 'S'),
(69, 'Saya tertarik menjadi kepala sekolah.', 'S'),
(70, 'Saya tertarik menjadi konselor masalah pribadi.', 'S'),
(71, 'Saya tertarik menjadi pekerja sosial.', 'S'),
(72, 'Saya tertarik menjadi konselor kejuruan dan pekerjaan.', 'S'),
(73, 'Saya suka mempengaruhi orang lain.', 'E'),
(74, 'Saya suka menjual suatu produk.', 'E'),
(75, 'Saya suka mempelajari strategi untuk keberhasilan bisnis.', 'E'),
(76, 'Saya suka menjadi pemimpin dalam kelompok.', 'E'),
(77, 'Saya suka memimpin kelompok dalam meraih tujuan tertentu.', 'E'),
(78, 'Saya mampu saya memenangkan penghargaan sebagai tenaga penjual atau pemimpin.', 'E'),
(79, 'Saya mampu saya tahu bagaimana menjadi pemimpin yang berhasil/sukses.', 'E'),
(80, 'Saya mampu saya seorang pembicara di depan umum yang baik,', 'E'),
(81, 'Saya mampu saya dapat mengelola usaha kecil.', 'E'),
(82, 'Saya mampu saya dapat membuat kelompok sosial atau kerja berjalan dengan baik.', 'E'),
(83, 'Saya mampu saya dikenal dapat berbicara dengan orang yang sulit/keras kepala.', 'E'),
(84, 'Saya mampu saya dapat mengelola kampanye penjualan.', 'E'),
(85, 'Saya mampu saya dapat mengatur pekerjaan orang lain.', 'E'),
(86, 'Saya mampu saya seorang yang berambisi dan cenderung bicara apa adanya.', 'E'),
(87, 'Saya mampu dan pandai mempengaruhi orang untuk melakukan sesuatu menurut cara saya.', 'E'),
(88, 'Saya mampu saya seorang tenaga penjual yang baik.', 'E'),
(89, 'Saya tertarik menjadi eksekutif periklanan.', 'E'),
(90, 'Saya tertarik menjadi pembawa acara/mc.', 'E'),
(91, 'Saya suka melakukan pekerjaan surat menyurat atau masalah perkantoran.', 'C'),
(92, 'Saya suka melakukan operasi matematika dalam bisnis atau pembukuan.', 'C'),
(93, 'Saya suka membuat catatan pengeluaran yang terperinci.', 'C'),
(94, 'Saya suka menyusun sistem pengarsipan.', 'C'),
(95, 'Saya suka membuat daftar inventaris dari persediaan atau produk.', 'C'),
(96, 'Saya mampu mengetik sepuluh jari dengan cepat.', 'C'),
(97, 'Saya mampu menjalankan mesin duplikator/mesin penjumlah.', 'C'),
(98, 'Saya mampu mengarsip surat dan berkas-berkas lain,', 'C'),
(99, 'Saya mampu melakukan pekerjaan administrasi kantor.', 'C'),
(100, 'Saya mampu menggunakan program pembukuan.', 'C'),
(101, 'Saya mampu melakukan tugas administratif dalam waktu singkat.', 'C'),
(102, 'Saya mampu menempatkan kredit dan debet.', 'C'),
(103, 'Saya mampu mencatat dengan cermat pembayaran/penjualan.', 'C'),
(104, 'Saya tertarik menjadi manajer penjualan.', 'C'),
(105, 'Saya tertarik menjadi ahli pembukuan.', 'C'),
(106, 'Saya tertarik menjadi kasir bank.', 'C'),
(107, 'Saya tertarik menjadi analisis keuangan.', 'C'),
(108, 'Saya tertarik menjadi penaksir biaya.', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_tipe_hasil`
--

CREATE TABLE `tabel_tipe_hasil` (
  `id` int(11) NOT NULL,
  `kode_tipe` varchar(1) NOT NULL,
  `nama_tipe` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_tipe_hasil`
--

INSERT INTO `tabel_tipe_hasil` (`id`, `kode_tipe`, `nama_tipe`, `deskripsi`) VALUES
(1, 'R', 'Realistic (Si Realistis)', 'Anda adalah orang yang praktis, suka bekerja dengan benda, mesin, perkakas, serta menyukai aktivitas fisik. Anda menikmati pekerjaan yang nyata dan menghasilkan sesuatu yang konkret.'),
(2, 'I', 'Investigative (Si Penyelidik)', 'Anda adalah seorang pemikir, suka mengamati, belajar, menyelidiki, dan memecahkan masalah. Anda menikmati pekerjaan yang membutuhkan analisis dan pemikiran mendalam.'),
(3, 'A', 'Artistic (Si Kreatif)', 'Anda memiliki jiwa seni, imajinatif, dan suka bekerja dalam situasi yang tidak terstruktur. Anda menikmati pekerjaan yang memungkinkan ekspresi diri dan kreativitas.'),
(4, 'S', 'Social (Si Sosial)', 'Anda suka membantu, mengajar, dan berinteraksi dengan orang lain. Anda menikmati pekerjaan yang melibatkan kerjasama tim dan memberikan pelayanan kepada orang lain.'),
(5, 'E', 'Enterprising (Si Wirausahawan)', 'Anda adalah seorang pemimpin, persuasif, dan suka mempengaruhi orang lain. Anda menikmati pekerjaan yang melibatkan penjualan, manajemen, dan pencapaian target.'),
(6, 'C', 'Conventional (Si Teratur)', 'Anda menyukai aturan, keteraturan, dan data. Anda menikmati pekerjaan yang membutuhkan ketelitian, detail, dan mengikuti prosedur yang sudah ada.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_guru_bk`
--
ALTER TABLE `tabel_guru_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_informasi`
--
ALTER TABLE `tabel_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_jawaban_pengguna`
--
ALTER TABLE `tabel_jawaban_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indeks untuk tabel `tabel_jurnal`
--
ALTER TABLE `tabel_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna_jurnal` (`id_pengguna`);

--
-- Indeks untuk tabel `tabel_jurusan`
--
ALTER TABLE `tabel_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_karier`
--
ALTER TABLE `tabel_karier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_tipe_hasil`
--
ALTER TABLE `tabel_tipe_hasil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_tipe` (`kode_tipe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_guru_bk`
--
ALTER TABLE `tabel_guru_bk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tabel_informasi`
--
ALTER TABLE `tabel_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tabel_jawaban_pengguna`
--
ALTER TABLE `tabel_jawaban_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `tabel_jurnal`
--
ALTER TABLE `tabel_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_jurusan`
--
ALTER TABLE `tabel_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tabel_karier`
--
ALTER TABLE `tabel_karier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tabel_pengguna`
--
ALTER TABLE `tabel_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `tabel_tipe_hasil`
--
ALTER TABLE `tabel_tipe_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
