## Teste Supera

Esta aplicação foi construída usando o framework Laravel.

Após clonar a aplicação e fazer o composer install, você pode usar a dockerização sail, existem dois scripts shell para facilitar subir e baixar os containeres:

<ul>
    <li>up</li>
    <li>down</li>
</ul>
Antes é preciso dar permissão de execução para os scripts.

No migrate usando a opção --seed, será criado também o usuário:

user = user1@user.com

password = 123456

Para este usuário o seeder criar veículos e manutenções, ao criar um novo usuário este não terá veículos cadastrados nem manutenções agendadas.
