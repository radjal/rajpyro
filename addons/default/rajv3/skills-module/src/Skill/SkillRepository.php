<?php namespace Rajv3\SkillsModule\Skill;

use Rajv3\SkillsModule\Skill\Contract\SkillRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class SkillRepository extends EntryRepository implements SkillRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var SkillModel
     */
    protected $model;

    /**
     * Create a new SkillRepository instance.
     *
     * @param SkillModel $model
     */
    public function __construct(SkillModel $model)
    {
        $this->model = $model;
    }
}
