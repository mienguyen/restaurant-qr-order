-- Xóa bảng nếu đã tồn tại
DROP TABLE IF EXISTS chi_tiet_don_hang;
DROP TABLE IF EXISTS don_hang;
DROP TABLE IF EXISTS mon_an;
DROP TABLE IF EXISTS ban_an;

-- ==========================
-- Bảng bàn ăn
-- ==========================
CREATE TABLE ban_an (
    ma_ban INT AUTO_INCREMENT PRIMARY KEY,
    ten_ban VARCHAR(50) NOT NULL,
    trang_thai ENUM('Trống','Có khách') NOT NULL DEFAULT 'Trống'
);

-- ==========================
-- Bảng món ăn
-- ==========================
CREATE TABLE mon_an (
    ma_mon INT AUTO_INCREMENT PRIMARY KEY,
    ten_mon VARCHAR(100) NOT NULL,
    gia DECIMAL(10,2) NOT NULL,
    hinh_anh VARCHAR(255),
    mo_ta TEXT,
    trang_thai ENUM('Còn bán','Hết món') NOT NULL DEFAULT 'Còn bán'
);

-- ==========================
-- Bảng đơn hàng
-- ==========================
CREATE TABLE don_hang (
    ma_don INT AUTO_INCREMENT PRIMARY KEY,
    ma_ban INT NOT NULL,
    thoi_gian_dat DATETIME DEFAULT CURRENT_TIMESTAMP,
    tong_tien DECIMAL(10,2) DEFAULT 0,

    CONSTRAINT fk_donhang_ban
        FOREIGN KEY (ma_ban)
        REFERENCES ban_an(ma_ban)
);

-- ==========================
-- Bảng chi tiết đơn hàng
-- ==========================
CREATE TABLE chi_tiet_don_hang (
    ma_ct INT AUTO_INCREMENT PRIMARY KEY,
    ma_don INT NOT NULL,
    ma_mon INT NOT NULL,
    so_luong INT NOT NULL,
    don_gia DECIMAL(10,2) NOT NULL,

    CONSTRAINT fk_ctdh_donhang
        FOREIGN KEY (ma_don)
        REFERENCES don_hang(ma_don),

    CONSTRAINT fk_ctdh_monan
        FOREIGN KEY (ma_mon)
        REFERENCES mon_an(ma_mon)
);