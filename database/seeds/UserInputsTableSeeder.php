<?php

use Illuminate\Database\Seeder;

class UserInputsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hourly Rates
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => '$5-$10']);
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => '$10-$15']);
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => '$15-$20']);
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => '$20-$25']);
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => '$25+']);
        DB::table('user_inputs')->insert(['category' => 'HourlyRate','subcategory' => 'Flexible']);

        //Education Level
        DB::table('user_inputs')->insert(['category' => 'Education','subcategory' => 'High School']);
        DB::table('user_inputs')->insert(['category' => 'Education','subcategory' => 'Some College']);
        DB::table('user_inputs')->insert(['category' => 'Education','subcategory' => 'Bachelor\'s Degree']);
        DB::table('user_inputs')->insert(['category' => 'Education','subcategory' => 'Master\'s Degree']);
        DB::table('user_inputs')->insert(['category' => 'Education','subcategory' => 'Doctorate Degree']);

        //Languages
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Akan']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Amharic']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Arabic']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Assamese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Awadhi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Azerbaijani']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Balochi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Belarusian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Bengali']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Bhojpuri']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Burmese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Cebuano (Visayan)']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Chewa']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Chhattisgarhi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Chittagonian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Czech']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Deccan']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Dhundhari']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Dutch']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Eastern Min']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'English']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'French']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Fula']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Gan Chinese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'German']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Greek']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Gujarati']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Haitian Creole']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hakka']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Haryanvi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hausa']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hiligaynon']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hindi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hmong']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Hungarian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Igbo']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Ilocano']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Italian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Japanese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Javanese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Jin']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Kannada']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Kazakh']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Khmer']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Kinyarwanda']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Kirundi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Konkani']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Korean']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Kurdish']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Madurese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Magahi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Maithili']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Malagasy']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Malay/Indonesian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Malayalam']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Mandarin']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Marathi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Marwari']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Mossi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Nepali']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Northern Min']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Odia (Oriya)']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Oromo']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Pashto']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Persian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Polish']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Portuguese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Punjabi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Quechua']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Romanian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Russian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Saraiki']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Serbo-Croatian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Shona']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Sindhi']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Sinhalese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Somali']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Southern Min']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Spanish']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Sundanese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Swedish']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Sylheti']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Tagalog']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Tamil']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Telugu']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Thai']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Turkish']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Turkmen']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Ukrainian']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Urdu']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Uyghur']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Uzbek']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Vietnamese']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Wu (Shanghainese)']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Xhosa']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Xiang (Hunnanese)']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Yoruba']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Yue (Cantonese)']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Zhuang']);
        DB::table('user_inputs')->insert(['category' => 'Language','subcategory' => 'Zulu']);
    }
}
