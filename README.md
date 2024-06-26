# Babysitter assistant 
## За базата данни
Базата данни е съставена от 3 таблици:  users, children, calendar.
В таблицата users се пази информация за регистрираните потребители. Всеки потребител има уникално ID.
В таблицата children се пази информация за децата на регистрираните продители, като всяко дете им уникално ID. Също така в тази таблица за всяко дете се пази ID на родителя му и детегледача, който го отглежа.
В таблицата calendar се пази информация за всички регистрирани събития. Всяко събитие има уникално ID. За да може да се разграничават събитията на различните деца тук се пази и ID-то на детето, за което е съответното събитие.
## За проекта
Проекта е Babysitter Assistant и представлява уеб базирана среда, която да позволява обмен на информация между родители и човек отглеждащ децата им - детегледач(ка). Той има следните функционалности:
# Форма за регистрация
При регистрация потребителят трябва да въведе данни за себе си, посочени в условието.             ( php/common/register.php) При регистрация в базата данни се проверява дали има регистриран потребител с тези данни и ако няма се добавя нов в таблицата users. За всеки потребител се генерира ново ID, като babysitter и parent ролите имат различен префикс в базата данни, за да се различават.
# Форма за вход
При вход потребителя трябва да въведе имейл адрес и парола. ( php/common/login.php) След това се проверява в базата данни дали има такъв регистриран потребител. Ако има, в текущата сесия се записва информация за потребителя (дали е babysitter или parent ) както и името, имейла и ID-то му. Това е необходимо, за да се разграничават различните потребители. След това потребителят бива пренасочен към съответната страница спрямо ролята му. Ако регистриран потребител няма, се изписва съобщение.

## Страница при вход като детегледач
В началото на всяка от страниците при вход като детегледач има навигационна лента с бърз достъп до начална страница, родители, деца, профил. Също така има възможност да се види текущия потребител и бутон за изход.
## Home - начална страница
Тук има възможност за избор между две менюта: Преглед на родители и техните деца и промяна на потребителските данни. При избор на Преглед на родители и техните деца се пренасочване към страницата с родителите, които са клиенти на детегледача.
## Parents - родители
Тук може да видим таблица с информацията на всички родители, чиито деца се отглеждат от текущия детегледач. За всеки от тях има бутон, който ни препраща до страница с информация за децата на този родител.( php/babysitter/parents.php)

## Children - деца
Тук има таблица с информация за децата, както и бутон за достъп до индивидуалния му календар.( php/babysitter/parents-children.php)
Подобно на предходната страница, тук отново виждаме таблица с информация за децата, за които детегледачът се грижи, като разликата е, че тук са абсолютно всички деца ( не само на определен родител ). Сега с натискането на бутона open може да видим календара за някое дете.
# Календар
При натискане на бутон Open се отваря персоналния календар на избраното от нас дете, като тук може да видим информация по интервали на всеки 15 минути за регистрираните събитията през деня. Имаме възможност за избор между различни изгледи - дневен, месечен и само самите събития. Също така може да се връщате към отминали дни и да преглеждате събитията от тогава. Текущия ден се отличава с различен цвят. Под навигацията има бутон Log activity, който дава възможност за въвеждане на ново събитие. С натискането му се зарежда форма с възможност за въвеждане на описание на събитието, както и час на начало и край. (php/babysitter/calendar_log_activity.php)  При натискане на Add в таблицата calendar се записва информацията за новото събитие, ID на събитието и ID на детето, за което се отнася събитието.
Има възможност за разглеждане на събитие ( с натискане върху него ), Като тук може да видим описанието му, началния и крайния час и коментар на родителя (ако е оставил такъв)
## Profile - Редактиране на профила.
Тук има форма, която дава възможност за редактиран на потребителските данни. След въвеждане на новите данни, базата данни се ъпдейтва. . (php/babysitter/profile.php) 

## Страница при вход като Родител
В началото на всяка от страниците при вход като родител има навигационна лента с бърз достъп до начална страница, календар, детегледачи, деца, профил. Също така има възможност да се види текущия потребител и бутон за изход. Да разгледаме всяка от тях, като започнем от Home - начална страница
 - Home - начална страница
Тук има възможност за избор между 4 менюта: Календар с активности, Свързване с детегледач, Добавяне на дете и промяна на потребителските данни. При избор на Календар с активности се пренасочване към страницата с децата на текущия потребител и възможност за отваряне на календара на всяко дете.
- Календар - При натискане на бутона open се зарежда персоналния календар на избраното дете. Той е аналогичен както в предходния случай, с тази разлика че тук няма бутон за добавяне на събитие. Друга разлика е, че когато родителя разглежда опредено събитие, той може да добави коментар. Това става с попълване на полето за коментар и натискане на бутона Add comment (php/parent/calendar_event.php)При натискането се изпълнява POST заявка, която се обработва като в таблицата calendar за текущото събитие, коментара се попълва в колоната
- Babysitters - Избор на детегледач
Тук се визуализира списък с регистрираните в платформата детегледачи, информация за тях и бутон Select, като при натискането му, този детегледач се избира за отглеждане на децата му. (php\parent\babysitters.php )С натискането на бутона се изпълнява POST заявка, при която в таблицата children за всяко дете на текущия потребител се записва ID-то на избрания детегледач в колоната.
- Children - Регистрирани деца и добавяне на дете.
Тук се визуализира списък с регистрираните деца на текущия потребител. Той включва информация за всяко дете, кой е детегледача и възможност за отваряне на календара. Също така има меню за добавяне на ново дете. С натискане на бутона Add kid се отваря форма за попълване на име и години на детето. (php/parent/children_add.php) При натискане на Add се изпълнява POST заявка, която се обработва като в таблицата children се записва новото дете
- Profile - Редактиране на профила.
Тук има форма, която дава възможност за редактиран на потребителските данни. След въвеждане на новите данни, базата данни се ъпдейтва.
- Logout - При натискане на logout бутона страницата се сменя на страница logout.php където текущата сесия се занулява и унищожава. След това се пренасочваме към страницата за влизане в профил
# Как работи календара.
За визуализиране на календар е използвана JavaScript библиотеката Fullcalendar като в директорията на проекта има локално копие на тази библиотека.
При натискане на бутон за отваряне на календар, в сесията се записва ID-то на детето, за което е отворен календара. Това позволява в последствие посредством това ID да се направи заявка към таблицата calendar от базата данни и да се вземат записите за детето с това ID.
Самата визуализация става във файла php/common/calendar.php. За да може календара динамично да се зарежда се използва ajax ( благодарение на JQuery ), като се прави заявка към php файл (events.php), който предоставя информацията от базата данни от таблицата calendar за ID-то споменато преди малко. Ако всичко премине коректно, данните се подават на API-то на Fullcalendar и то се грижи за визуализирането им в календара. При проблем се вика alert.

