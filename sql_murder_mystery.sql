select * from crime_scene_report where city='SQL City' and date='20180115' and type='murder'
/* Northwestern Dr, Franklin Ave-Annabel*/
select * from person where address_street_name='Northwestern Dr' order by address_number desc limit 1
/* first witness - 14887 Morty Schapiro 118009*/
select * from person where address_street_name='Franklin Ave' and name like '%Annabel%'
/*second witness 16371	Annabel Miller	490173*/
select * from interview where person_id=14887
/*first witness interview 14887	get fit now bag membership id = '48Z%' gold member license plate = '%H42W%'*/
select * from interview where person_id=16371
/*second witness gym was at gym 20180109 (maybe 2018)*/
select * from get_fit_now_check_in where membership_id like '48Z%' and check_in_date='20180109'
/* PEOPLE AT GYM - 48Z7A and 48Z55*/ 
select * from get_fit_now_member where id='48Z7A' or id='48Z55'
/* both members are gold, ids are 67318 Jeremy Bowers AND 28819 Joe Germuska*/
select * from person where id=67318 or id=28819
select * from drivers_license where id=173289 or id=42337
/*423327 is the culprit*/
select * from person where license_id=423327
/*culprit is Jeremy Bowers*/
