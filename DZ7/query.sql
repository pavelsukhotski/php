-- Расписание занятий группы

SELECT groups.ng, dolzhnosti.d, teachers.surname, teachers.name, teachers.middlename, disc.nd, vid_zanyatii.vz, camps.adress, lecture_rooms.num_lr, raspisanie.date_zan, raspisanie.time_start, raspisanie.count_hours
FROM raspisanie
JOIN teacher_gr ON raspisanie.id_tg = teacher_gr.id_tg
JOIN lecture_rooms ON raspisanie.id_lr = lecture_rooms.id_lr
JOIN teachers ON teacher_gr.id_t = teachers.id_t
JOIN groups ON teacher_gr.id_gr = groups.id_gr
JOIN chasi_disc ON teacher_gr.id_cd = chasi_disc.id_cd
JOIN dolzhnosti ON teachers.id_d = dolzhnosti.id_d
JOIN ucheb_pl ON groups.id_plan = ucheb_pl.id_plan
JOIN vid_zanyatii ON chasi_disc.id_vz = vid_zanyatii.id_vz
JOIN disc_spec ON chasi_disc.id_ds = disc_spec.id_ds/*, disc_spec.id_plan = ucheb_pl.id_plan*/
JOIN form_study ON ucheb_pl.id_fo = form_study.id_fo
JOIN specs ON ucheb_pl.id_spec = specs.id_spec
JOIN disc ON disc_spec.id_disc = disc.id_disc
/*JOIN ucheb_pl ON disc_spec.id_plan = ucheb_pl.id_plan*/ /*вот тут мне не ясно, как описать связь по id_plan*/
JOIN camps ON lecture_rooms.id_camp = camps.id_camp

WHERE groups.ng='N1';


-- Расписание занятий преподавателя

SELECT teachers.surname, teachers.name, teachers.middlename, dolzhnosti.d, disc.nd, vid_zanyatii.vz, camps.adress, lecture_rooms.num_lr, groups.ng, raspisanie.date_zan, raspisanie.time_start, raspisanie.count_hours
FROM raspisanie
JOIN teacher_gr ON raspisanie.id_tg = teacher_gr.id_tg
JOIN lecture_rooms ON raspisanie.id_lr = lecture_rooms.id_lr
JOIN teachers ON teacher_gr.id_t = teachers.id_t
JOIN groups ON teacher_gr.id_gr = groups.id_gr
JOIN chasi_disc ON teacher_gr.id_cd = chasi_disc.id_cd
JOIN dolzhnosti ON teachers.id_d = dolzhnosti.id_d
JOIN ucheb_pl ON groups.id_plan = ucheb_pl.id_plan
JOIN vid_zanyatii ON chasi_disc.id_vz = vid_zanyatii.id_vz
JOIN disc_spec ON chasi_disc.id_ds = disc_spec.id_ds/*, disc_spec.id_plan = ucheb_pl.id_plan*/
JOIN form_study ON ucheb_pl.id_fo = form_study.id_fo
JOIN specs ON ucheb_pl.id_spec = specs.id_spec
JOIN disc ON disc_spec.id_disc = disc.id_disc
/*JOIN ucheb_pl ON disc_spec.id_plan = ucheb_pl.id_plan*/ /*вот тут мне не ясно, как описать связь по id_plan*/
JOIN camps ON lecture_rooms.id_camp = camps.id_camp

WHERE teachers.surname = 'Пушкин' && teachers.name = 'Александр' && teachers.middlename = 'Сергеевич';


-- Сведения о проведенных преподавателем занятиях

SELECT teachers.surname, teachers.name, teachers.middlename, dolzhnosti.d, disc.nd, vid_zanyatii.vz,/* camps.adress, lecture_rooms.num_lr,*/ groups.ng, raspisanie.date_zan,/* raspisanie.time_start,*/ raspisanie.count_hours
FROM raspisanie
JOIN teacher_gr ON raspisanie.id_tg = teacher_gr.id_tg
JOIN lecture_rooms ON raspisanie.id_lr = lecture_rooms.id_lr
JOIN teachers ON teacher_gr.id_t = teachers.id_t
JOIN groups ON teacher_gr.id_gr = groups.id_gr
JOIN chasi_disc ON teacher_gr.id_cd = chasi_disc.id_cd
JOIN dolzhnosti ON teachers.id_d = dolzhnosti.id_d
JOIN ucheb_pl ON groups.id_plan = ucheb_pl.id_plan
JOIN vid_zanyatii ON chasi_disc.id_vz = vid_zanyatii.id_vz
JOIN disc_spec ON chasi_disc.id_ds = disc_spec.id_ds/*, disc_spec.id_plan = ucheb_pl.id_plan*/
JOIN form_study ON ucheb_pl.id_fo = form_study.id_fo
JOIN specs ON ucheb_pl.id_spec = specs.id_spec
JOIN disc ON disc_spec.id_disc = disc.id_disc
/*JOIN ucheb_pl ON disc_spec.id_plan = ucheb_pl.id_plan*/ /*вот тут мне не ясно, как описать связь по id_plan*/
JOIN camps ON lecture_rooms.id_camp = camps.id_camp

WHERE teachers.surname = 'Пушкин' && teachers.name = 'Александр' && teachers.middlename = 'Сергеевич' && raspisanie.date_zan  <= '2016-05-12';