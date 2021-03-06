<?php

namespace MicrosoftTeamsDriver\Cards\OutgoingListCard;

use MicrosoftTeamsDriver\Cards\CardMessage;

/**
 * @see https://docs.microsoft.com/en-us/microsoftteams/platform/task-modules-and-cards/cards/cards-reference#list-card
 */
class OutgoingListMessage implements CardMessage
{
    protected string $title;
    protected array $items;
    protected array $buttons = [];

    public function __construct(string $title, array $items = [])
    {
        $this->title = $title;
        $this->items = $items;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getButtons(): array
    {
        return $this->buttons;
    }

    public function addButton(array $button): self
    {
        $this->buttons[] = $button;
        return $this;
    }

    public function getContent(): array
    {
        return [
            'title' => $this->title,
            'items' => $this->items,
            'buttons' => $this->convertQuestion($message),
        ];
    }
}

