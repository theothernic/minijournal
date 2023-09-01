<?php
    namespace App\View\Models;

    use Illuminate\Database\Eloquent\Model;

    abstract class ViewModel
    {

        public function __construct(mixed $data)
        {
            $this->hydrate($data);
        }

        public function hydrate(mixed $data): void
        {
            if ($data instanceof Model)
            {
                $this->eloquentHydrate($data);
            }
            else
            {
                foreach($data as $k => $v)
                    $this->setProperty($k, $v);
            }
        }

        private function eloquentHydrate(Model $model): void
        {
            $data = $model->getAttributes();

            foreach ($data as $k => $v)
                $this->setProperty($k, $v);
        }

        private function setProperty(mixed $k, mixed $v): void
        {
            if (property_exists($this, $k))
                $this->$k = $v;
        }
    }
