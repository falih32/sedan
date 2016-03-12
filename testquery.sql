--Query untuk ambil table detail kons 1
SELECT sjd_sub_judul, t_detail_konsultan1.*
FROM t_detail_konsultan1 
LEFT JOIN t_sub_judul
ON dtk_sub_judul = sjd_id
WHERE dtk_pgd = '40'
