INSERT INTO crm_c4(c4_id, c3_name, c3_datereg )
SELECT id, hoten,  FROM tuyensinh
LEFT JOIN crm_c4 ON id = c4_id
WHERE crm_c4.c4_id IS NULL



#  Update crm_c3 from tuyensinh table
INSERT INTO crm_c3(c3_id, c3_name, c3_tel, c3_email, c3_nganhdangky, c3_bangcapcaonhat, c3_diachinoio, c3_nguon, c3_datereg)
SELECT id, hoten, dienthoai, email, nganhhoc, truongtotnghiep, diachi, nguon, reg_date FROM tuyensinh

# Add fields to crm_c4
ALTER TABLE `crm_c4`
ADD COLUMN `CMND` VARCHAR(20) NULL AFTER `user_id`,
ADD COLUMN `noicap` VARCHAR(50) NULL AFTER `CMND`,
ADD COLUMN `ngaycap` VARCHAR(20) NULL AFTER `noicap`,
ADD COLUMN `ngaysinh` VARCHAR(20) NULL AFTER `ngaycap`,
ADD COLUMN `gioitinh` VARCHAR(20) NULL AFTER `ngaysinh`,
ADD COLUMN `nguyenquan` VARCHAR(150) NULL AFTER `gioitinh`,
ADD COLUMN `HKTT` VARCHAR(150) NULL AFTER `nguyenquan`,
ADD COLUMN `totnghiep` VARCHAR(150) NULL AFTER `HKTT`,
ADD COLUMN `tentruong` VARCHAR(150) NULL AFTER `totnghiep`,
ADD COLUMN `hedaotao` VARCHAR(150) NULL AFTER `tentruong`,
ADD COLUMN `nganhtotnghiep` VARCHAR(150) NULL AFTER `hedaotao`,
ADD COLUMN `namtotnghiep` VARCHAR(20) NULL AFTER `nganhtotnghiep`,
ADD COLUMN `donvicapbang` VARCHAR(150) NULL AFTER `namtotnghiep`,
ADD COLUMN `loaitotnghiep` VARCHAR(150) NULL AFTER `donvicapbang`,
ADD COLUMN `truongchamsoc` VARCHAR(150) NULL AFTER `loaitotnghiep`,
ADD COLUMN `nganhhoc` VARCHAR(150) NULL AFTER `truongchamsoc`;


# C3 sang C4
SELECT * FROM (SELECT * 
FROM (
	SELECT *,
		REPLACE(SUBSTRING_INDEX(nguon_new, '.', 2), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 1),'.'), '') AS truong,
		REPLACE(SUBSTRING_INDEX(nguon_new, '.', 3), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 2),'.'), '') AS SP,
		REPLACE(SUBSTRING_INDEX(nguon_new, '.', 7), CONCAT(SUBSTRING_INDEX(nguon_new, '.', 6),'.'), '') AS khuvuc
	FROM (
		SELECT *,
			SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(TRIM(c3_nguon), '/', 1), '&', 1), '=', 1), '%' , 1) AS nguon_new,
			REGEXP_REPLACE(REGEXP_REPLACE(c3_tel, '[\+A-Za-z )(\.\-]', ''), '^0|^84|^0084', '') AS tel_new
		FROM crm_c3
		WHERE DATE(c3_datereg) >= (DATE_FORMAT(NOW() ,'%Y-%m-%d') - INTERVAL 3 DAY)
	) TMP
	ORDER BY c3_datereg
) TMP2
GROUP BY tel_new, truong) TMP3
LEFT JOIN crm_c4 C4 ON TMP3.c3_id = C4.c3_id
WHERE C4.c3_id IS NULL
