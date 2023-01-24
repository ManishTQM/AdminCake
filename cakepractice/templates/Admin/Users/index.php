<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<?php $session = $this->request->getSession();
echo $session->read('name');
error_reporting(0);
 ?>
 <?php echo $this->Form->create(null,['type'=>'get'])?>
<?php echo $this->Form->control('key',['label'=>'Search','value'=>$this->request->getQuery('key')])?>
<?php echo $this->Form->submit()?>
<?php echo $this->Form->end()?>
<div class="users index content">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('first_name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('created_date') ?></th>
                    <th><?= $this->Paginator->sort('modified_date') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('updated_time') ?></th>
                    <th><?= $this->Paginator->sort('Change Status') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= $this->Number->format($user->phone_number) ?></td>
                    <td><?= h($user->gender) ?></td>
                    <td><?= h($user->created_date) ?></td>
                    <td><?= h($user->modified_date) ?></td>
                    <td><?= h($user->code) ?></td>
                    <td><?= h($user->updated_time) ?></td>
            <td>
                <?php if ($user->status == 1): ?>
                
             <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id,$user->status], ['block'=>true,'confirm' => __('Are you sure you want to inactive # {0}?', $user->id)]) ?>
            <?php else: ?>
            <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id,$user->status], ['block'=>true,'confirm' => __('Are you sure you want to Active # {0}?', $user->id)]) ?>
            <?php endif ?>
        
        </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
