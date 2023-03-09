<?php 

namespace Deegitalebe\PackageSign\Models;

class SignUrl {

    protected string $responsibleId;

    protected string $responsibleType;
    /** @return static */
    public function setResponsibleId(?string $responsibleId)
    {
        $this->responsibleId = $responsibleId;
        return $this;
    }

    /** @return static */
    public function setResponsibleType(?string $responsibleType)
    {
        $this->responsibleType = $responsibleType;
        return $this;
    }

    public function getResponsibleId(): ?string
    {
        return $this->responsibleId;
    }

    public function getResponsibleType(): ?string
    {
        return $this->responsibleType;
    }

}
