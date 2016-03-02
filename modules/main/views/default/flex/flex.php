<?php

/**
 * @var $this yii\base\View
 */
?>

<div class="grid">
    <div class="span-12 span-12-xs span-12-md span-12-sm span-12-lg mycol">
        <div class="grid justify-space-around">
            <div class="span-2 span-12-sm span-12-xs text-center mycol">

            </div>
            <div class="span-7 span-4-md span-12-sm mycol">
                <div class="nav">
                    <?php
                    echo \yii\widgets\Menu::widget([
                        'items' => [
                            ['label' => 'Главная', 'url' => ['default/index']],
                            ['label' => 'Flex', 'url' => ['default/flex']],
                            ['label' => 'Услуги', 'url' => ['site/services']],
                            ['label' => 'Контакты', 'url' => ['site/contacts']],
                        ],
                        'options' => [
                            'class' => '',
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="span-2 span-12-sm span-12-xs">
                <a class="button button-block button-primary" href="">button</a>
            </div>
        </div>
    </div>
</div>

<div class="grid justify-space-around">
    <div class="span-8 span-12-md text-center one" style="padding: 10px">
        <h1>Text</h1>
        <h2>Text</h2>
        <h3>Text</h3>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Sex</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Dave Gamache</td>
                <td>26</td>
                <td>Male</td>
                <td>San Francisco</td>
            </tr>
            <tr>
                <td>Dwayne Johnson</td>
                <td>42</td>
                <td>Male</td>
                <td>Hayward</td>
            </tr>
            </tbody>
        </table>
        <ul>
            <li>Item 1</li>
            <li>
                Item 2
                <ul>
                    <li>Item 2.1</li>
                    <li>Item 2.2</li>
                </ul>
            </li>
            <li>Item 3</li>
        </ul>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, debitis delectus dolores eaque et eveniet
        explicabo inventore ipsam molestias nisi odio, perferendis, quam quasi qui quos rerum temporibus? Odio, ut.
        <div class="grid">
            <div class="span-6 span-12-lg span-6-md mycol hide-md"> Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Architecto atque consectetur ea eaque esse eveniet id ipsam ipsum, iste magnam non obcaecati
                recusandae, sequi sunt, voluptate. Accusantium libero necessitatibus voluptas!
            </div>
            <div class="span-6 span-12-lg span-6-md mycol grow-1-md">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Corporis distinctio ea facere nam nisi quasi rem sequi? Culpa doloremque excepturi quo
                reprehenderit? Impedit nemo placeat provident repudiandae vel veniam voluptatum.
            </div>
        </div>
    </div>
    <div class="span-3" style="padding: 10px">
        <div class="alert">alert</div>
        <div class="alert alert-error">alert</div>
        <div class="alert alert-warning">alert</div>
        <div class="alert alert-done">alert</div>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias aliquid animi aspernatur assumenda
        atque deserunt expedita modi mollitia nihil non, quaerat repellat reprehenderit totam voluptatum. Consequuntur
        magni quia quis.
    </div>
</div>

<div class="grid">
    <div class="span-12 span-12-xs span-12-md span-12-sm span-12-lg one">
        <code>code</code>
    </div>
</div>