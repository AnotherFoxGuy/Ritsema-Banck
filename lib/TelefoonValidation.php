<?php

namespace RitsemaBanck;
class TelefoonValidation
{
    private $phone;

    public function setPhone($Phone)
    {
        $this->phone = $Phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function valPhone($Phone)
    {
        $temp = str_split($Phone);
        $bool = true;
        while ($bool == true) {
            for ($i = 0; $i < 10; $i++) {
                if (preg_match('@[0-9]@', $temp[$i])) {
                    continue;
                }
                return false;
                $bool = false;
            }
            $this->setPhone($Phone);
            $bool = false;
        }
    }
}