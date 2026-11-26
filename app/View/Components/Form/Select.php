<?php

namespace App\View\Components\Form;

use App\Models\Vacancy;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @param  list<string>|array<string, string>  $options
     */
    public function __construct(
        public string $name,
        public array $options,
        public ?string $value = null
    ) {
        //
    }

    /**
     * Get the options formatted with labels.
     *
     * If provided a sequential list, values are keyed to themselves.
     * If already associative, returns the array as-is.
     *
     * @return array<int|string, string>
     */
    public function optionsWithLabels(): array
    {
        return array_is_list($this->options)
            ? array_combine($this->options, Vacancy::normalizeLabels($this->options))
            : $this->options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
