SELECT MONTH(tgl_req) AS 'bulan',COUNT(*) AS 'total' 
FROM tb_det_amprah 
WHERE YEAR(tgl_req)='2021'
GROUP BY MONTH(tgl_req);