-- информация об остатке часов по дисциплинам по видам занятий (общее количество часов минус количество часов занятий в расписании)

SELECT
  vid_zanyatii.vz,
  disc.nd,
  sum(chasi_disc.chasi) - sum(raspisanie.count_hours) AS ostatok_chasov
  
  
FROM raspisanie
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
  INNER JOIN vid_zanyatii
    ON chasi_disc.id_vz = vid_zanyatii.id_vz
  INNER JOIN disc_spec
    ON chasi_disc.id_ds = disc_spec.id_ds
  INNER JOIN ucheb_pl
    ON disc_spec.id_plan = ucheb_pl.id_plan
  INNER JOIN disc
    ON disc_spec.id_disc = disc.id_disc
  INNER JOIN specs
    ON ucheb_pl.id_spec = specs.id_spec
  INNER JOIN form_study
    ON ucheb_pl.id_fo = form_study.id_fo
WHERE raspisanie.date_zan >= '2016-05-12'
GROUP BY vid_zanyatii.id_vz,
         disc.nd

         
-- среднее количество часов занятий в день по аудиториям

SELECT
  lecture_rooms.num_lr,
 count(raspisanie.date_zan) AS kol_vo_dnei,
  SUM(chasi_disc.chasi) AS kol_vo_chasov,
SUM(chasi_disc.chasi) / count(raspisanie.date_zan) AS sred_v_den
FROM raspisanie
  INNER JOIN lecture_rooms
    ON raspisanie.id_lr = lecture_rooms.id_lr
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
GROUP BY lecture_rooms.num_lr


-- средняя загрузка студентов в день

SELECT
  count(raspisanie.date_zan) AS kol_vo_dnei,
  SUM(chasi_disc.chasi) AS kol_vo_chasov,
SUM(chasi_disc.chasi) / count(raspisanie.date_zan) AS sred_zagruzka
FROM raspisanie
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
    
    
-- общие итоги о количестве проведенных часов занятий по группам

SELECT
  groups.ng,
  SUM(chasi_disc.chasi) - SUM(raspisanie.count_hours) AS itog
FROM raspisanie
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
  INNER JOIN groups
    ON teacher_gr.id_gr = groups.id_gr
WHERE raspisanie.date_zan < '2016-05-12'
  GROUP BY GROUps.ng
  
-- общие итоги о количестве проведенных часов занятий по преподавателям

SELECT
  teachers.surname,
  teachers.name,
  teachers.middlename,
  SUM(chasi_disc.chasi) - SUM(raspisanie.count_hours) AS itog
FROM raspisanie
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
  INNER JOIN teachers
    ON teacher_gr.id_t = teachers.id_t
WHERE raspisanie.date_zan < '2016-05-12'
GROUP BY teachers.surname,
         teachers.name,
         teachers.middlename
         

-- общие итоги о количестве проведенных часов занятий по аудиториям

SELECT
  camps.adress,
  lecture_rooms.num_lr,
  SUM(chasi_disc.chasi) - SUM(raspisanie.count_hours) AS itog
FROM raspisanie
  INNER JOIN teacher_gr
    ON raspisanie.id_tg = teacher_gr.id_tg
  INNER JOIN chasi_disc
    ON teacher_gr.id_cd = chasi_disc.id_cd
  INNER JOIN lecture_rooms
    ON raspisanie.id_lr = lecture_rooms.id_lr
  INNER JOIN camps
    ON lecture_rooms.id_camp = camps.id_camp
WHERE raspisanie.date_zan < '2016-05-12'
GROUP BY camps.adress,
         lecture_rooms.num_lr
