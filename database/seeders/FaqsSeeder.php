<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('faqs')->delete();
        $model = Faq::create([
            'id' => 1,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Kompüterim niyə yavaş işləyir?',
                'answer' => 'Lazımsız fon proqramlarını yoxlayın və onları bağlayın. Müvəqqəti faylları təmizləyin və diskin təmizlənməsini həyata keçirin. Heç bir infeksiya olmadığından əmin olmaq üçün bir virus taraması keçirməyi düşünün. Həmçinin, kifayət qədər boş disk sahəsinin olduğunu yoxlayın.',
            ]);
        }

        $model = Faq::create([
            'id' => 2,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Wi-Fi şəbəkəsinə necə qoşula bilərəm??',
                'answer' => ' Cihazınızda Wi-Fi-ın aktiv olduğundan əmin olun. Mövcud şəbəkələri axtarın və siyahıdan Wi-Fi şəbəkənizi seçin. Tələb olunduqda Wi-Fi parolunuzu daxil edin. Hələ də problem yaşayırsınızsa, marşrutlaşdırıcını yenidən başladın və yenidən cəhd edin.3',
            ]);
        }

        $model = Faq::create([
            'id' => 3,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Printerim niyə işləmir?',
                'answer' => 'Printerin işə salındığını və şəbəkəyə və ya kompüterinizə qoşulduğunu yoxlayın. Tepsidə kağız olduğundan və toner və ya mürəkkəb səviyyələrinin kifayət qədər olduğundan əmin olun. İstənilən kağız tıxaclarını təmizləyin. Printerinizi yenidən başladın və yenidən çap etməyə cəhd edin.',
            ]);
        }


        $model = Faq::create([
            'id' => 4,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Mən parolumu necə sıfırlaya bilərəm?',
                'answer' =>' Əgər parolunuzu sıfırlamalısınızsa, daxil olmağa çalışdığınız hesabın giriş səhifəsində "Şifrəni unutdum" və ya oxşar linki axtarın. Adətən e-poçt və ya mətn mesajı kimi yoxlama metodunu əhatə edən təlimatlara əməl edin.',
            ]);
        }

        $model = Faq::create([
            'id' => 5,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Yeni proqram təminatını necə quraşdıra bilərəm?',
                'answer' => 'Proqram təminatını etibarlı mənbədən yükləyin. Yüklənmiş faylı açın və quraşdırma təlimatlarına əməl edin. Quraşdırma yeri və əlavə proqram təklifləri kimi quraşdırma zamanı təqdim olunan hər hansı lisenziya müqavilələrinə və seçimlərə diqqət yetirin.',
            ]);
        }



        $model = Faq::create([
            'id' => 6,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Niyə proqram təminatım xarab olur?',
                'answer' => 'Kompüterinizi yenidən başladın və proqramı yenidən işə salın. Proqram təminatının yeni olduğundan əmin olun. Proqram təminatçısının veb saytından yeniləmələri və ya yamaları yoxlayın. Problem davam edərsə, proqramı yenidən quraşdırmağa cəhd edin.'
            ]);
        }




        $model = Faq::create([
            'id' => 7,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Niyə e-poçtum göndərilmir/qəbul edilmir?',
                'answer' => 'İnternet bağlantınızı və e-poçt serverinizin statusunu yoxlayın. Alıcının e-poçt ünvanını düzgün daxil etdiyinizə əmin olun. E-poçt hesabı parametrlərinizi və gələnlər qutunuzun dolu olmadığını yoxlayın. İşləyib-işləmədiyini yoxlamaq üçün test e-poçtu göndərməyə çalışın.'
            ]);
        }




        $model = Faq::create([
            'id' => 8,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Məlumatımı necə yedəkləyə bilərəm?',
                'answer' => 'Vacib faylların ehtiyat nüsxəsini çıxarmaq üçün xarici sərt diskdən və ya bulud saxlama xidmətindən istifadə edin. Məlumatlarınızın qorunmasını təmin etmək üçün müntəzəm ehtiyat nüsxələrini planlaşdırın. Prosesi avtomatlaşdırmaq və mühüm məlumatların surətlərini bir neçə yerdə saxlamaq üçün ehtiyat proqram təminatından istifadə edin.'
            ]);
        }



        $model = Faq::create([
            'id' => 9,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Kompüterimi viruslardan və zərərli proqramlardan necə qoruya bilərəm?',
                'answer' => 'Nüfuzlu antivirus proqramını quraşdırın və onu yeni saxlayın. Real vaxt rejimində mühafizəni aktivləşdirin və müntəzəm skan edin. Naməlum mənbələrdən faylları yükləməkdən və şübhəli keçidlərə klikləməkdən çəkinin. Əməliyyat sisteminizi və proqram təminatınızı yeni saxlayın.'
            ]);
        }


        $model = Faq::create([
            'id' => 10,
        ]);
        foreach (Cache::get('active_langs') as $lang) {
            $model->translations()->create([
                'locale' => $lang->code,
                'question' => 'Niyə video konfrans proqramımla bağlı problem yaşayıram?',
                'answer' => 'İnternet bağlantınızı sabitlik və sürət üçün yoxlayın. Cihazınızı və proqramı yenidən başladın. Proqramınızın güncəl olduğundan və cihazınızın əməliyyat sistemi ilə uyğun olduğundan əmin olun. Lazım gələrsə, audio və video keyfiyyəti kimi proqram parametrlərinizi tənzimləyin.']
            );
        }
    }
}
