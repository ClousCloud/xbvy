<?php

namespace xpocketmc\xbvy;

class XPocketMPHandler {
    private string $serverName;
    private array $playersOnline;
    private array $bannedPlayers;

    public function __construct(string $serverName, array $playersOnline, array $bannedPlayers = []) {
        $this->serverName = $serverName;
        $this->playersOnline = $playersOnline;
        $this->bannedPlayers = $bannedPlayers;
    }

    public function handleSpecialOperation(): void {
        $this->logActivity("Handling special operation...");
        $this->backupDatabase();
        $this->sendNotification("Special operation has been performed on the server.");
    }

    public function executeCommand(string $command): void {
        $this->logActivity("Executing command: $command");
        $this->executeServerCommand($command);
    }

    public function sendNotification(string $message): void {
        foreach ($this->playersOnline as $player) {
            $this->sendPlayerNotification($player, $message);
        }
    }

    public function getPlayerCount(): int {
        return count($this->playersOnline);
    }

    public function getPlayerList(): array {
        return $this->playersOnline;
    }

    public function teleportPlayer(string $player, array $destination): void {
        $this->logActivity("Teleporting player $player to destination: " . implode(',', $destination));
        $this->updatePlayerLocation($player, $destination);
    }

    public function kickPlayer(string $player, string $reason): void {
        $this->logActivity("Kicking player $player for reason: $reason");
        $this->removePlayer($player);
    }

    public function banPlayer(string $player, string $reason): void {
        $this->logActivity("Banning player $player for reason: $reason");
        $this->removePlayer($player);
        $this->addBannedPlayer($player);
    }

    public function getServerName(): string {
        return $this->serverName;
    }

    public function setServerName(string $serverName): void {
        $this->logActivity("Changing server name to: $serverName");
        $this->serverName = $serverName;
    }

    public function getPlayerOnlineStatus(string $player): bool {
        return in_array($player, $this->playersOnline);
    }

    public function getBannedPlayers(): array {
        return $this->bannedPlayers;
    }

    private function logActivity(string $activity): void {
        echo "Logged activity: $activity" . PHP_EOL;
    }

    private function backupDatabase(): void {
        echo "Performed database backup" . PHP_EOL;
    }

    private function executeServerCommand(string $command): void {
        echo "Executed command on server: $command" . PHP_EOL;
    }

    private function sendPlayerNotification(string $player, string $message): void {
        echo "Sent notification to player $player: $message" . PHP_EOL;
    }

    private function updatePlayerLocation(string $player, array $location): void {
        echo "Updated player $player location to: " . implode(',', $location) . PHP_EOL;
    }

    private function removePlayer(string $player): void {
        if (($key = array_search($player, $this->playersOnline)) !== false) {
            unset($this->playersOnline[$key]);
        }
        echo "Removed player $player from the server" . PHP_EOL;
    }

    private function addBannedPlayer(string $player): void {
        $this->bannedPlayers[] = $player;
        echo "Added player $player to the banned list" . PHP_EOL;
    }
}
