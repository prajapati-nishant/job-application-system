<?php

namespace App\Http\Livewire\Common\Applications;

use Livewire\Component;

class Languages extends Component
{
    public $availableLanguages, $languages = [];

    public function mount($languages = [])
    {
        $languages = collect($languages);
        $this->languages = [];
        $this->availableLanguages = config('setting.available_languages');
        foreach ($this->availableLanguages as $language) {
            $selectedLanguage = $languages->where('name', $language)->first();
            $this->languages[$language] = [
                'is_check' => !empty($selectedLanguage),
                'read' => !empty($selectedLanguage) ? $selectedLanguage['read'] : false,
                'write' => !empty($selectedLanguage) ? $selectedLanguage['write'] : false,
                'speak' => !empty($selectedLanguage) ? $selectedLanguage['speak'] : false,
            ];
        }
    }

    public function render()
    {
        return view('livewire.common.applications.languages');
    }

    public function back()
    {
        $this->emitUp('back');
    }

    public function save()
    {
        $languages = [];
        foreach ($this->languages as $name => $language) {
            if ($language['is_check']) {
                $languages[] = [
                    'name' => $name,
                    'read' => !empty($language['read']) ? 1 : false,
                    'write' => !empty($language['write']) ? 1 : false,
                    'speak' => !empty($language['speak']) ? 1 : false,
                ];
            }
        }
        $this->emitUp('languages', $languages);
    }
}
