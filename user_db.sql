-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2022 pada 11.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `ekskul` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` enum('diterima','tunggu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_peserta`
--

INSERT INTO `data_peserta` (`id`, `nis`, `nama`, `kelas`, `ekskul`, `jk`, `tmp_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `status`) VALUES
(51, '202110385', 'Rio Ragil Ramdani', '12 RPL 3', 'Basketball', 'Laki - Laki', 'Wonogiri', '2004-07-02', '081221114903', 'Kp.Pasar Kemis, Manggahang, Baleendah', 'diterima'),
(52, '202110357', 'Aditia Viadi', '12 RPL 3', 'Basketball', 'Laki - Laki', 'Bandung', '2005-08-12', '089662150492', 'Manggahang', 'diterima'),
(53, '202110361', 'Aufa Dimas Andara', '12 RPL 3', 'Basketball', 'Laki - Laki', 'Bandung', '2005-06-01', '089626164908', 'Manggahang', 'diterima'),
(54, '202110358', 'Agus Saepul Imam', '12 RPL 3', 'Bulu Tangkis', 'Laki - Laki', 'Bandung', '2005-08-24', '083801527300', 'Baleendah', 'diterima'),
(55, '202110388', 'Sinta Novianti', '12 RPL 3', 'Bulu Tangkis', 'Perempuan', 'Bandung', '2005-09-05', '089', 'Baleendah', 'diterima'),
(56, '202110285', 'Adam Atma Wiguna', '12 RPL 3', 'Basketball', 'Laki - Laki', 'Bandung', '2005-02-12', '089', 'Kp.Pasar Kemis, Manggahang, Baleendah', 'diterima'),
(57, '202110307', 'Nanda Putria Iswara', '12 RPL 1', 'Pramuka', 'Perempuan', 'Bandung', '2005-06-23', '089', 'Baleendah', 'diterima'),
(58, '202110292', 'Diki Hermawan', '12 RPL 1', 'Basketball', 'Laki - Laki', 'Bandung', '2005-09-17', '089', 'Manggahang', 'diterima'),
(59, '202110305', 'Muhammad Fadlan Arya Guna', '12 RPL 1', 'Basketball', 'Laki - Laki', 'Bandung', '2004-05-09', '089', 'Baleendah', 'diterima'),
(60, '202110339', 'Muhamad Elpajar Alajmi', '12 RPL 2', 'Basketball', 'Laki - Laki', 'Bandung', '2005-02-06', '089', 'Baleendah', 'diterima'),
(61, '202110345', 'Putri Lauzda Febriani', '12 RPL 2', 'Sapta Art', 'Perempuan', 'Bandung', '2005-02-03', '089', 'Cipicung', 'diterima'),
(62, '202110320', 'Yoseph Budiman', '12 RPL 2', 'Pramuka', 'Laki - Laki', 'Bandung', '2004-04-07', '089', 'Baleendah', 'tunggu'),
(63, '202110001', 'Ibnu Maulana', '12 DPIB 1', 'Pramuka', 'Laki - Laki', 'Bandung', '2005-05-16', '089', 'Baleendah', 'tunggu'),
(64, '202110002', 'M Alvin', '12 TAV 3', 'Pramuka', 'Laki - Laki', 'Bandung', '2005-10-12', '089', 'Baleendah', 'tunggu'),
(65, '202110003', 'Sigit Rahgunawan', '10 TKRO 1', 'Wanapala', 'Laki - Laki', 'Wates', '2006-07-20', '089', 'Baleendah', 'tunggu'),
(66, '202110359', 'Allisa Zahra Apriliani', '12 RPL 3', 'Paskibra', 'Perempuan', 'Bandung', '2005-04-09', '081312652127', 'Kp. Cimuncang Rt 001/012', 'tunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_kelas`
--

CREATE TABLE `dt_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_kelas`
--

INSERT INTO `dt_kelas` (`id`, `kelas`) VALUES
(35, '10 DPIB 1'),
(36, '10 DPIB 2'),
(37, '10 DPIB 3'),
(16, '10 RPL 1'),
(18, '10 RPL 2'),
(19, '10 RPL 3'),
(26, '10 TAV 1'),
(27, '10 TAV 2'),
(28, '10 TAV 3'),
(44, '10 TBSM 1'),
(45, '10 TBSM 2'),
(46, '10 TBSM 3'),
(53, '10 TKRO 1'),
(54, '10 TKRO 2'),
(55, '10 TKRO 3'),
(38, '11 DPIB 1'),
(39, '11 DPIB 2'),
(40, '11 DPIB 3'),
(20, '11 RPL 1'),
(21, '11 RPL 2'),
(22, '11 RPL 3'),
(29, '11 TAV 1'),
(30, '11 TAV 2'),
(31, '11 TAV 3'),
(47, '11 TBSM 1'),
(48, '11 TBSM 2'),
(49, '11 TBSM 3'),
(56, '11 TKRO 1'),
(57, '11 TKRO 2'),
(58, '11 TKRO 3'),
(41, '12 DPIB 1'),
(42, '12 DPIB 2'),
(43, '12 DPIB 3'),
(23, '12 RPL 1'),
(24, '12 RPL 2'),
(25, '12 RPL 3'),
(32, '12 TAV 1'),
(33, '12 TAV 2'),
(34, '12 TAV 3'),
(50, '12 TBSM 1'),
(51, '12 TBSM 2'),
(52, '12 TBSM 3'),
(59, '12 TKRO 1'),
(60, '12 TKRO 2'),
(61, '12 TKRO 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(225) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `ig` varchar(225) NOT NULL,
  `ringkasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `eskul`
--

INSERT INTO `eskul` (`id`, `nama`, `deskripsi`, `foto`, `logo`, `ig`, `ringkasan`) VALUES
(5, 'Basketball', '<p>&nbsp;Bola basket menjadi salah satu olahraga yang paling digemari oleh penduduk Amerika Serikat dan penduduk di belahan bumi lainnya, antara lain di Amerika Selatan, Eropa Selatan, Lithuania, dan juga di Indonesia. Banyak kompetisi bola basket yang diselenggarakan setiap tahun, seperti British Basketball League (BBL) di Inggris, National Basketball Association (NBA) di Amerika, dan Indonesia Basketball League (IBL) di Indonesia. Bola basket merupakan salah satu cabang olahraga yang menuntut VO2 max tinggi. Dengan latihan VO2 max ini dapat ditingkatkan yang menghasilkan peningkatan hanya berkisar 25% dari kondisi awal latihan. Dari latihan tersebut elebihnya ditentukan oleh potensi fisik yang ada pada setiap individu.[butuh sumber yang lebih baik] Bola basket merupakan cabang olahraga dengan waktu istirahat yang lebih lama, sehingga dapat memanfaatkan teknik recovery dengan tepat.<br></p>', '345-basket.jpg', '372-basket.jpg', 'https://instagram.com/basketball_sevenbe?igshid=YmMyMTA2M2Y=', '<p>&nbsp;Bola basket adalah olahraga bola berkelompok yang terdiri atas dua tim beranggotakan masing-masing lima orang yang saling bertanding mencetak poin dengan memasukkan bola ke dalam keranjang lawan.Bola basket dapat di lapangan terbuka, walaupun pertandingan profesional pada umumnya dilakukan di ruang tertutup. Lapangan pertandingan yang diperlukan juga relatif tidak besar, misal dibandingkan dengan sepak bola.Selain itu, permainan bola basket juga lebih kompetitif karena tempo permainan cenderung lebih cepat jika dibandingkan dengan olahraga bola yang lain, seperti voli dan sepak bola <br></p>'),
(6, 'Bola Tangan', '<p>&nbsp;Pada zaman Yunani Kuno, peraturan permainan bola tangan sudah dimainkan. Permaianan \"Urania\" yang dimainkan oleh orang Yunani kuno (digambarkan Homer dan Odyssey) dan harpaston yang sering dimainkan oleh orang Romawi yang bernama Claudius Galenus sekitar pada tahun 130 sampai dengan 200 Masehi. Di Jerman peramainan bola tangan dikenal dengan sebutan \"Fangballspiel\" atau permainan \"tangkap bola\" yang diperkenalkan oleh penulis puisi Jerman yaitu Walther von der Vgelweide (1170-1230). Di Perancis seorang bernama Rabeilas (1494-1533) menggambarkan permainan bola tangan dengan bermain bola tangan menggunakan telapak tangan. Pada tahun 1793 masyarakat yang hidup di dataran yang hijau serta menggambarkan dan membuat ilustrasi dengan bola tangan. Pada tahun 1484, administrator olahraga yang berasal dari Denmark mengijinkan permainan ini agar dilakukan di sekolah lanjutan di Ortup Denmark dan mendorong untuk segera menyertakan aturan dalam bola tangan.<br></p>', '148-bolatan.jpg', '187-bolatanagn.jpg', 'https://instagram.com', '<p>&nbsp;Bola tangan adalah salah satu olahraga dalam permainan bola besar yang cara bermainnya mengoper bola dengan tangan ke sesama anggota tim dengan tujuan memasukkan ke gawang lawan.[1] Bola tangan dimainkan dua tim yang berisi tujuh orang dalam satu kelompok. Enam orang itu adalah pemain yang bergerak bebas di lapangan dan sisanya bertindak sebagai kiper. Lapangan bola tangan berukuran panjang 90 sampai dengan 400 meter dan lebar 55 sampai dengan 65 meter. Sementara bola yang digunakan memiliki ukuran berbeda antara tim putra dan putri. Bola untuk tim putra beratnya mencapai 425-475 gram, sedangkan untuk putri 325-400 gram. Diameter bola juga berbeda, tim putra kelilingnya lebih besar, yaitu antara 58-60 cm. Sementara untuk putri, keliling bola yang harus digunakan adalah 54-56 cm.<br></p>'),
(7, 'Sapta Art', '<p>Seni Tari adalah suatu gerakan yang berirama, dilakukan di suatu tempat dan waktu\r\n tertentu untuk mengekpresikan suatu perasaan dan menyampaikan pesan \r\ndari seseorang maupun kelompok. Seni menjadi wujud ekspresi diri dari \r\nmanusia, yang sering dijadikan sarana hiburan dan pertunjukan.&nbsp;</p>\r\n<p>Secara umum&nbsp;\r\n adalah cabang seni yang mengungkapkan keindahan, ekspresi, hingga makna\r\n tertentu melalui media gerak tubuh yang disusun dan diperagakan \r\nsedemikian rupa untuk memberikan penampilan dan pengalaman yang \r\nmenyenangkan atau menumbuhkan horison baru bagi penontonnya. Seni tari \r\ndapat dilakukan secara tunggal, berpasangan, berkelompok atau kolosal.</p><p></p>', '796-saptaart.jpg', '765-saptalg.jpg', 'https://instagram.com/sapta.art?igshid=YmMyMTA2M2Y=', '<p>Sapta Art adalah salah satu ekstrakulikuler yang ada di SMKN 7 Baleendah yang bergerak di bidang kesenian , seperti tari tradisional, drama musikal, mural, dan upacara adat<br></p>'),
(8, 'Futsal', '<p>Futsal dipopulerkan di Montevideo, Uruguay pada tahun 1930, oleh Juan Carlos Ceriani. Keunikan futsal mendapat perhatian di seluruh Amerika Selatan, terutamanya di Brasil. Ketrampilan yang dikembangkan dalam permainan ini dapat dilihat dalam gaya terkenal dunia yang diperlihatkan pemain-pemain Brasil di luar ruangan, pada lapangan berukuran biasa. Pele, bintang terkenal Brasil, contohnya, mengembangkan bakatnya di futsal. Sementara Brasil terus menjadi pusat futsal dunia, permainan ini sekarang dimainkan di bawah perlindungan Fédération Internationale de Football Association di seluruh dunia, dari Eropa hingga Amerika Tengah dan Amerika Utara serta Afrika, Asia, dan Oseania.<br></p>', '541-futsal.jpg', '136-futsallg.jpg', 'https://instagram.com/futsalsmkn7baleendah?igshid=YmMyMTA2M2Y=', '<p>&nbsp; Futsal adalah permainan bola yang dimainkan oleh dua tim, yang masing-masing beranggotakan lima orang. Tujuannya adalah memasukkan bola ke gawang lawan, dengan memanipulasi bola dengan kaki. Selain lima pemain utama, setiap regu juga diizinkan memiliki pemain cadangan. Tidak seperti permainan sepak bola dalam ruangan lainnya, lapangan futsal dibatasi garis, bukan net atau papan.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Futsal turut juga dikenali dengan berbagai nama lain. Istilah \"futsal\" adalah istilah internasionalnya, berasal dari kata Spanyol atau Portugis, futbol (sepak bola) dan sala (dalam ruangan).<br></p>'),
(9, 'Paskibra', '<p>Gagasan Paskibra lahir pada tahun 1946, pada saat ibu kota Indonesia \r\ndipindahkan ke Yogyakarta. Memperingati HUT Proklamasi Kemerdekaan RI \r\nyang ke-1, Presiden Soekarno memerintahkan salah satu ajudannya, Mayor \r\n(Laut) Husein Mutahar,\r\n untuk menyiapkan pengibaran bendera di halaman Istana Gedung \r\nAgung Yogyakarta. Pada saat itulah, di benak Mutahar terlintas suatu \r\ngagasan bahwa sebaiknya pengibaran bendera pusaka dilakukan oleh para \r\npemuda dari seluruh penjuru Tanah Air, karena mereka adalah generasi \r\npenerus perjuangan bangsa yang bertugas.</p>', '510-paskib.jpg', '82-paskiblg.jpg', 'https://instagram.com/paskibra7baleendah.official?igshid=YmMyMTA2M2Y=', '<p><span>Paskibraka adalah singkatan dari Pasukan Pengibar Bendera Pusaka \r\ndengan tugas utamanya untuk mengibarkan dan menurunkan Bendera Pusaka \r\ndalam upacara peringatan Hari Kemerdekaan Republik Indonesia dan \r\nProklamasi Kemerdekaan Republik Indonesia di tiga tempat, yakni tingkat \r\nkabupaten/kota, provinsi, dan nasional</span></p>'),
(10, 'Pramuka', '<p>Kepramukaan adalah proses pendidikan di luar lingkungan sekolah dan di luar lingkungan keluarga dalam bentuk kegiatan menarik, menyenangkan, sehat, teratur, terarah, praktis yang dilakukan di alam terbuka dengan Prinsip Dasar Kepramukaan dan Metode Kepramukaan, yang sasaran akhirnya pembentukan watak, akhlak, dan budi pekerti luhur. Kepramukaan adalah sistem pendidikan kepanduan yang disesuaikan dengan keadaan, kepentingan, dan perkembangan masyarakat, dan bangsa Indonesia.<br></p>', '943-pramuka.jpg', '731-356-pramuka1.jpg', 'https://instagram.com/scoutseven_be?igshid=YmMyMTA2M2Y=', '<p>Pramuka merupakan sebutan bagi anggota Gerakan Pramuka, yang meliputi; Pramuka Siaga (7–10 tahun), Pramuka Penggalang (11–15 tahun), Pramuka Penegak (16–20 tahun) dan Pramuka Pandega (21-25 tahun). Kelompok anggota yang lain yaitu Pembina Pramuka, Andalan Pramuka, Korps Pelatih Pramuka, Pamong Saka Pramuka, Staf Kwartir dan Majelis Pembimbing.<br></p>'),
(11, 'Wanapala', '<p>--<br></p>', '883-wanapala.jpg', '63-wanapalalg.jpg', 'https://instagram.com/officialwanapala_7?igshid=YmMyMTA2M2Y=', '<p>Wanapala adalah salah satu ekstrakulikuler yang ada di SMKN 7 Baleendah.\r\n Organisai ini diperuntukan untuk mendidik siswa agar lebih menghargai \r\nalam dan lingkungan sekitar. Selain itu organisai ini juga bertujuan \r\nuntuk memberikan ilmu bagi anggotanya yang memiliki minat dalam \r\nmenjelajahi alam atau adventuring. </p>'),
(12, 'PMR', '<p>Kebijakan PMI dan federasi tentang pembinaan Remaja bahwa:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remaja merupakan prioritas pembinaan, baik dalam keanggotaan maupun kegiatan kepalangmerahan.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remaja berperan penting dalam pengembangan kegiatan kepalangmerahan.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remaja berperan penting dalam perencanaan, pelaksanaan kegiatan dan proses pengambilan keputusan untuk kegiatan PMI.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remaja adalah kader relawan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remaja calon pemimpin PMI pada masa depan. </p><p>Palang Merah Remaja atau PMR adalah suatu organisasi binaan dari Palang Merah Indonesia yang berpusat di sekolah-sekolah ataupun kelompok-kelompok masyarakat (sanggar, kelompok belajar, dll.) yang bertujuan membangun dan mengembangkan karakter Kepalangmerahan agar siap menjadi Relawan PMI pada masa depan.<br></p>', '421-pmr.jpg', '554-pmrlg.png', 'https://instagram.com/pabeu7oe?igshid=YmMyMTA2M2Y=', '<p>&nbsp;Palang Merah Remaja (disingkat PMR) adalah wadah pembinaan dan pengembangan anggota remaja PMI, yang selanjutnya disebut PMR. Terdapat di PMI kota atau kabupaten di seluruh Indonesia, dengan anggota lebih dari 5 juta orang, anggota PMR merupakan salah satu kekuatan PMI dalam melaksanakan kegiatan-kegiatan kemanusiaan dibidang kesehatan dan siaga bencana, mempromosikan prinsip-prinsip dasar gerakan palang merah dan bulan sabit merah internasional, serta mengembangkan kapasitas organisasi PMI.<br></p>'),
(13, 'Perisai Diri', '<p>--<br></p>', '97-pd.jpg', '572-pdl.jpg', 'https://instagram.com/perisaidiriseven?igshid=YmMyMTA2M2Y=', '<p>Perisai Diri merupakan salah satu organisasi olahraga beladiri yang menjadi anggota IPSI (Ikatan Pencak Silat Indonesia), induk organisasi resmi pencak silat di Indonesia di bawah KONI (Komite Olahraga Nasional Indonesia). Perisai Diri menjadi salah satu dari sepuluh perguruan silat yang mendapat predikat Perguruan Historis karena mempunyai peran besar dalam sejarah terbentuk dan berkembangnya IPSI. Perisai Diri didirikan secara resmi pada tanggal 2 Juli 1955 di Surabaya, Jawa Timur. Pendirinya adalah almarhum RM Soebandiman Dirdjoatmodjo, putra bangsawan Keraton Paku Alam. Sebelum mendirikan Perisai Diri secara resmi, beliau melatih silat di lingkungan Perguruan Taman Siswa atas permintaan pamannya, Ki Hajar Dewantoro<br></p>'),
(14, 'Sindo', '<p>--<br></p>', '842-sindo.jpg', '403-sindol.jpg', 'https://instagram.com/sindo_smkn7_be?igshid=YmMyMTA2M2Y=', '<p>Ikatan Pencak Silat atau dikenal dengan IPSI adalah wadah organisai bagi seluruh jajaran pencak silat Indonesia. IPSI didirikan Pada tanggal 18 mei 1948 di surakrta, Jawa Tengah.<br></p>'),
(15, 'Kamus 7', '<p>--<br></p>', '82-kamus7.jpg', '503-kamus7.jpg', 'https://instagram.com/kamus7_?igshid=YmMyMTA2M2Y=', '<p>&nbsp;Ikatan Remaja Masjid Keluarga Muslim SMKN 7 Baleendah merupaka salah satu kegiatan ekstrakulikuler yang ada di sekolah. Ekstrakulikuler Irma Kamus 7 berfungsi untuk mananamkan nilai-nilai ajaran agama islam yang telah diperoleh pada saat proses pembelajaran di kelas.<br></p>'),
(16, 'Voly', '<p>&nbsp;Pada awal penemuannya, olahraga permainan bola voli ini diberi nama Mintonette. Olahraga ini pertama kali ditemukan oleh seorang Instruktur pendidikan jasmani (Director of Phsycal Education) yang bernama William G. Morgan di YMCA pada tanggal 9 Februari 1895, di Holyoke, Massachusetts (Amerika Serikat).[3] Morgan, yang juga merupakan lulusan Springfield College of YMCA, menciptakan permainan ini empat tahun setelah diciptakannya olahraga bola basket oleh James Naismith. Olahraga Mintonette ini sebenarnya merupakan sebuah permainan yang diciptakan dengan menggabungkan beberapa jenis permainan, yaitu bola basket, bisbol, tenis, dan bola tangan (handball).[4] Pada awalnya, permainan ini diciptakan khusus bagi anggota YMCA yang sudah tidak berusia muda lagi, sehingga permainan ini pun dibuat tidak seaktif permainan bola basket.</p><p>&nbsp;Perubahan nama Mintonette menjadi volleyball (bola voli) terjadi pada tahun 1896, pada demonstrasi pertandingan pertamanya di International YMCA Training School. Pada awal tahun 1896 tersebut, Dr. Luther Halsey Gulick (Director of the Professional Physical Education Training School sekaligus sebagai Executive Director of Department of Physical Education of the International Committee of YMCA) mengundang dan meminta Morgan untuk mendemonstrasikan permainan baru yang telah ia ciptakan di stadion kampus yang baru. Pada sebuah konferensi yang bertempat di kampus YMCA, Springfield tersebut juga dihadiri oleh seluruh instruktur pendidikan jasmani. Dalam kesempatan tersebut, Morgan membawa dua tim yang pada masing-masing tim beranggotakan lima orang. Dalam kesempatan itu, Morgan juga menjelaskan bahwa permainan tersebut adalah permainan yang dapat dimainkan di dalam maupun di luar ruangan dengan sangat leluasa. Dan menurut penjelasannya pada saat itu, permainan ini dapat juga dimainkan oleh banyak pemain. Tidak ada batasan jumlah pemain yang menjadi standar dalam permainan tersebut. Sedangkan sasaran dari permainan ini adalah mempertahankan bola agar tetap bergerak melewati net yang tinggi, dari satu wilayah ke wilayah lain (wilayah lawan).<br></p>', '299-volilg.jpg', '815-volilg.jpg', 'https://instagram.com', '<p>&nbsp;Bola voli (bahasa Inggris: volleyball) adalah permainan olahraga yang dimainkan oleh dua grup berlawanan. Masing-masing grup memiliki enam orang pemain. Terdapat pula variasi permainan bola voli pantai yang masing-masing timnya hanya memiliki dua orang pemain. Olahraga ini dinaungi FIVB (Fédération Internationale de Volleyball)[1] sebagai induk organisasi internasional. Sedangkan di Indonesia, olahraga bola Voli dinaungi oleh PBVSI (Persatuan Bola Voli Seluruh Indonesia) <br></p>'),
(17, 'Bulu Tangkis', '<p>&nbsp;Mirip dengan tenis, bulu tangkis bertujuan memukul bola permainan bulu tangkis, yaitu kok (shuttlecock) melewati jaring agar jatuh di bidang permainan lawan yang sudah ditentukan dan berusaha mencegah lawan melakukan hal yang sama.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lapangan bulu tangkis berbentuk persegi panjang dan mempunyai ukuran seperti terlihat pada gambar. Garis-garis yang ada mempunyai ketebalan 40 mm dan harus berwarna kontras terhadap warna lapangan. Warna yang disarankan untuk garis adalah putih atau kuning. Permukaan lapangan disarankan terbuat dari kayu atau bahan sintetis yang lunak. Permukaan lapangan yang terbuat dari beton atau bahan sintetik yang keras sangat tidak dianjurkan karena dapat mengakibatkan cedera pada pemain. Jaring setinggi 1,55 m berada tepat di tengah lapangan. Jaring harus berwarna gelap kecuali bibir jaring yang mempunyai ketebalan 75 mm harus berwarna putih.</p><p>Tujuan permainan adalah untuk memukul sebuah kok menggunakan raket, melewati jaring ke wilayah lawan, sampai lawan tidak dapat mengembalikannya kembali. Area permainan berbeda untuk partai tunggal dan ganda. Bila kok jatuh di luar area tersebut maka kok dikatakan \"keluar\". <br></p>', '472-btl.png', '896-btl.png', 'https://instagram.com', '<p>Bulu tangkis atau badminton (bahasa Inggris: badminton) adalah suatu olahraga yang menggunakan alat yang berbentuk bulat dengan memiliki rongga-rongga di bagian pemukulnya. Dan memiliki gagang. Alat ini dikenal dengan nama raket yang dimainkan oleh dua orang (untuk tunggal) atau dua pasangan (untuk ganda) yang saling berlawanan.<br></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `kelas` varchar(225) NOT NULL,
  `eskul` varchar(225) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nis`, `nama`, `kelas`, `eskul`, `nilai`) VALUES
(3, 202110385, 'Rio Ragil Ramdani', '12 RPL 3', 'Basketball', '90'),
(4, 202110357, 'Aditia Viadi', '12 RPL 3', 'Basketball', '90'),
(5, 202110358, 'Agus Saepul Imam', '12 RPL 3', 'Bulu Tangkis', '87');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembina`
--

CREATE TABLE `pembina` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL,
  `ekstrakulikuler` varchar(225) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembina`
--

INSERT INTO `pembina` (`id`, `nama`, `jabatan`, `ekstrakulikuler`, `foto`) VALUES
(4, 'Rani Prastuti S.Pd', 'Pembina', 'Pramuka', '16092022052840avatar-2.jpg'),
(5, 'Dika Setia Budhi', 'Pelatih', 'Basketball', '16092022053146avatar-6.jpg'),
(6, 'Drs. Agus Supriatna', 'Pembina', 'Paskibra', '16092022053314avatar-1.png'),
(7, 'Edi Djunaedi', 'Pelatih', 'Perisai Diri', '16092022053558avatar-1.png'),
(8, 'Fadilah N.H', 'Pelatih', 'PMR', '16092022053746avatar-9.jpg'),
(9, 'Muhamad Nizar Ramadhan S.Pd', 'Pelatih', 'Bulu Tangkis', '16092022053936avatar-1.png'),
(10, 'Nina Husnaeni S, S.Pd', 'Pembina', 'Sapta Art', '16092022054059avatar-1.png'),
(11, 'Rahardian Firmansyah', 'Pelatih', 'Basketball', '16092022054502avatar-5.jpeg'),
(12, 'Sugiih Esa S.Pd.I', 'Pembina', 'Kamus 7', '16092022054336avatar-4.jpg'),
(14, 'Andri', 'Pelatih', 'Voly', '16092022054708avatar-1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(24, 'Paskibra', 'Lomba PBB', '2022-10-16 09:00:00', '2022-10-16 21:00:00'),
(30, 'Pramuka', 'Pelantikan penegak bantara', '2022-06-25 06:00:00', '2022-06-26 10:00:00'),
(31, 'Pramuka', 'Pandu Memories', '2022-08-14 08:00:00', '2022-08-14 16:00:00'),
(32, 'Pramuka', 'Pandu Memories 12', '2022-09-19 08:00:00', '2022-09-20 16:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Admin Ekstrakulikuler', 'smkn7bisa@gmail.com', '7b5b9e3852613c9943b9685f86925a87', 'admin'),
(5, 'Admin Test', 'goahead@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(15, 'Rio Ragil Ramdani', 'rioragil221@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(16, 'Aditia Viadi', 'aditiaviadi@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(17, 'Aufa Dimas Andara', 'aufaandara36@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(18, 'Agus Saepul Imam', 'agusimam08@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(19, 'Sinta Novianti', 'sintanovianti41@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(20, 'Adam Atma Wiguna', 'adamwiguna@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(21, 'Nanda Putria Iswara', 'nandaiswara@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(22, 'Diki Hermawan', 'dikihermawan@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(23, 'Muhammad Fadlan Arya Guna', 'mfadlan@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(24, 'Muhamad Elpajar Alajmi', 'melpajar@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(25, 'Putri Lauzda Febriani', 'putrifebriani@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(26, 'Yoseph Budiman', 'yosephb@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(27, 'Ibnu Maulana', 'ibnum@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(28, 'M Alvin', 'malvin@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(29, 'Sigit Rahgunawan', 'rahgunawansigit@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(33, 'Allisa Zahra Apriliani', 'allisaapriliani@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(37, 'Arya Wiguna', 'io@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `dt_kelas`
--
ALTER TABLE `dt_kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas` (`kelas`);

--
-- Indeks untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indeks untuk tabel `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `dt_kelas`
--
ALTER TABLE `dt_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
