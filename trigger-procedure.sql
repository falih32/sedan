DROP TRIGGER update_detail_pengadaan;
-- trigger update total harga satuan detail pengadaan
DELIMITER //
CREATE TRIGGER update_detail_pengadaan BEFORE UPDATE ON t_detail_pengadaan
FOR EACH ROW
BEGIN		
	IF (NEW.dtp_hargasatuan_hps <> OLD.dtp_hargasatuan_hps) THEN
		SET NEW.dtp_jumlahharga_hps = NEW.dtp_hargasatuan_hps*NEW.dtp_volume;
	END IF;
	IF (NEW.dtp_hargasatuan_pnr <> OLD.dtp_hargasatuan_pnr) THEN
		SET NEW.dtp_jumlahharga_pnr = NEW.dtp_hargasatuan_pnr*NEW.dtp_volume;
	END IF;
	IF (NEW.dtp_hargasatuan_fix <> OLD.dtp_hargasatuan_fix) THEN
		SET NEW.dtp_jumlahharga_fix = NEW.dtp_hargasatuan_fix*NEW.dtp_volume;
	END IF;

END;


DROP TRIGGER insert_detail_pengadaan;
-- trigger insert total harga satuan detail pengadaan
DELIMITER //
CREATE TRIGGER insert_detail_pengadaan BEFORE INSERT ON t_detail_pengadaan
FOR EACH ROW
BEGIN
	SET NEW.dtp_jumlahharga_hps = NEW.dtp_hargasatuan_hps*NEW.dtp_volume;
	SET NEW.dtp_jumlahharga_pnr = NEW.dtp_hargasatuan_pnr*NEW.dtp_volume;
	SET NEW.dtp_jumlahharga_fix = NEW.dtp_hargasatuan_fix*NEW.dtp_volume;
END;

DROP PROCEDURE sum_total_pengadaan;
DELIMITER //
CREATE PROCEDURE sum_total_pengadaan(IN v_pgd_id BIGINT, IN v_pajak FLOAT)
BEGIN
	DECLARE v_total_hps DECIMAL;
	DECLARE v_total_pnr DECIMAL;
	DECLARE v_total_fix DECIMAL;
	
	SELECT IFNULL(SUM(dtp_jumlahharga_hps),'0') INTO v_total_hps FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtp_jumlahharga_pnr),'0') INTO v_total_pnr FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtp_jumlahharga_fix),'0') INTO v_total_fix FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	UPDATE t_pengadaan
	SET pgd_jml_sblm_ppn_hps = v_total_hps,
		pgd_jml_sblm_ppn_pnr = v_total_pnr,
		pgd_jml_sblm_ppn_fix = v_total_fix,
		pgd_jml_ssdh_ppn_hps = (v_total_hps+(v_total_hps*v_pajak)),
		pgd_jml_ssdh_ppn_pnr = (v_total_pnr+(v_total_pnr*v_pajak)),
		pgd_jml_ssdh_ppn_fix = (v_total_fix+(v_total_fix*v_pajak))
	WHERE pgd_id = v_pgd_id;
	SELECT v_pajak FROM DUAL ;
		SELECT v_total_hps FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_pnr FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_fix FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
END;

call sum_total_pengadaan (15,'0.1');

-----------------------------------------------------------------------------------------

DROP TRIGGER update_detail_konsultan1;
-- trigger update total harga satuan detail konsultan1
DELIMITER //
CREATE TRIGGER update_detail_konsultan1 BEFORE UPDATE ON t_detail_konsultan1
FOR EACH ROW
BEGIN		
	IF (NEW.dtk_biaya_personil_hps <> OLD.dtk_biaya_personil_hps) THEN
		SET NEW.dtk_jml_biaya_hps = NEW.dtk_biaya_personil_hps*NEW.dtk_kuantitas;
	END IF;
	IF (NEW.dtk_biaya_personil_pnr <> OLD.dtk_biaya_personil_pnr) THEN
		SET NEW.dtk_jml_biaya_pnr = NEW.dtk_biaya_personil_pnr*NEW.dtk_kuantitas;
	END IF;
	IF (NEW.dtk_biaya_personil_fix <> OLD.dtk_biaya_personil_fix) THEN
		SET NEW.dtk_jml_biaya_fix = NEW.dtk_biaya_personil_fix*NEW.dtk_kuantitas;
	END IF;

END;


DROP TRIGGER insert_detail_konsultan1;
-- trigger insert total harga satuan detail konsultan1
DELIMITER //
CREATE TRIGGER insert_detail_konsultan1 BEFORE INSERT ON t_detail_konsultan1
FOR EACH ROW
BEGIN
	SET NEW.dtk_jml_biaya_hps = NEW.dtk_biaya_personil_hps*NEW.dtk_kuantitas;
	SET NEW.dtk_jml_biaya_pnr = NEW.dtk_biaya_personil_pnr*NEW.dtk_kuantitas;
	SET NEW.dtk_jml_biaya_fix = NEW.dtk_biaya_personil_fix*NEW.dtk_kuantitas;
END;

DROP TRIGGER update_detail_konsultan2;
-- trigger update total harga satuan detail pengadaan
DELIMITER //
CREATE TRIGGER update_detail_konsultan2 BEFORE UPDATE ON t_detail_konsultan2
FOR EACH ROW
BEGIN		
	IF (NEW.dtk2_hargasatuan_hps <> OLD.dtk2_hargasatuan_hps) THEN
		SET NEW.dtk2_jumlahharga_hps = NEW.dtk2_hargasatuan_hps*NEW.dtk2_volume;
	END IF;
	IF (NEW.dtk2_hargasatuan_pnr <> OLD.dtk2_hargasatuan_pnr) THEN
		SET NEW.dtk2_jumlahharga_pnr = NEW.dtk2_hargasatuan_pnr*NEW.dtk2_volume;
	END IF;
	IF (NEW.dtk2_hargasatuan_fix <> OLD.dtk2_hargasatuan_fix) THEN
		SET NEW.dtk2_jumlahharga_fix = NEW.dtk2_hargasatuan_fix*NEW.dtk2_volume;
	END IF;

END;


DROP TRIGGER insert_detail_konsultan2;
-- trigger insert total harga satuan detail pengadaan
DELIMITER //
CREATE TRIGGER insert_detail_konsultan2 BEFORE INSERT ON t_detail_konsultan2
FOR EACH ROW
BEGIN
	SET NEW.dtk2_jumlahharga_hps = NEW.dtk2_hargasatuan_hps*NEW.dtk2_volume;
	SET NEW.dtk2_jumlahharga_pnr = NEW.dtk2_hargasatuan_pnr*NEW.dtk2_volume;
	SET NEW.dtk2_jumlahharga_fix = NEW.dtk2_hargasatuan_fix*NEW.dtk2_volume;
END;

DROP PROCEDURE sum_total_pengadaan_konsultan;
DELIMITER //
CREATE PROCEDURE sum_total_pengadaan_konsultan(IN v_pgd_id BIGINT, IN v_pajak FLOAT)
BEGIN
	DECLARE v_total_hps DECIMAL;
	DECLARE v_total_pnr DECIMAL;
	DECLARE v_total_fix DECIMAL;
	
	DECLARE v_total_hps1 DECIMAL;
	DECLARE v_total_pnr1 DECIMAL;
	DECLARE v_total_fix1 DECIMAL;
	
	SELECT IFNULL(SUM(dtk_jml_biaya_hps),0) INTO v_total_hps FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	SELECT IFNULL(SUM(dtk_jml_biaya_pnr),0) INTO v_total_pnr FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	SELECT IFNULL(SUM(dtk_jml_biaya_fix),0) INTO v_total_fix FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	
	SELECT IFNULL(SUM(dtk2_jumlahharga_hps),0) INTO v_total_hps1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtk2_jumlahharga_pnr),0) INTO v_total_pnr1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtk2_jumlahharga_fix),0) INTO v_total_fix1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	
	UPDATE t_pengadaan
	SET pgd_jml_sblm_ppn_hps = (v_total_hps+v_total_hps1),
		pgd_jml_sblm_ppn_pnr = (v_total_pnr+v_total_pnr1),
		pgd_jml_sblm_ppn_fix = (v_total_fix+v_total_fix1),
		pgd_jml_ssdh_ppn_hps = ((v_total_hps+v_total_hps1)+((v_total_hps+v_total_hps1)*v_pajak)),
		pgd_jml_ssdh_ppn_pnr = ((v_total_pnr+v_total_pnr1)+((v_total_pnr+v_total_pnr1)*v_pajak)),
		pgd_jml_ssdh_ppn_fix = ((v_total_fix+v_total_fix1)+((v_total_fix+v_total_fix1)*v_pajak))
	WHERE pgd_id = v_pgd_id;
	SELECT v_pajak FROM DUAL ;
		SELECT v_total_hps FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_pnr FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_fix FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
END;

call sum_total_pengadaan_konsultan (15,'0.1');