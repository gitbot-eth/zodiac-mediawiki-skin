<?php
/**
 * BaseTemplate class for Foo Bar skin
 *
 * @ingroup Skins
 */
class ZodiacTemplate extends BaseTemplate
{
	private function getZodiacFooterIcons() {
		$footericons = $this->get( 'footericons' );
		foreach ( $footericons as $footerIconsKey => &$footerIconsBlock ) {
			foreach ( $footerIconsBlock as $footerIconKey => $footerIcon ) {
				if ( !isset( $footerIcon['src'] ) ) {
					unset( $footerIconsBlock[$footerIconKey] );
				}
			}
		}
		return $footericons;
	}

	/**
	 * Outputs the entire contents of the page
	 */
	public function execute()
	{
		$this->html('headelement'); ?>

	<div class="relative w-full px-6 pt-10 mx-auto mb-2">
		<div class="md:absolute top-0 mt-2 md:mt-6 w-full left-0 px-6">
			<ul class="flex flex-wrap justify-center md:justify-end list-reset personal-tools">
				<?php foreach ($this->getPersonalTools() as $key => $item) {
					echo $this->makeListItem($key, $item);
				} ?>
			</ul>
		</div>
		<div class="flex flex-col items-center justify-center w-full">
			<h1 class="text-3xl md:text-5xl font-thin leading-none tracking-widest uppercase text-brown-200 border-0">Zodiac Wiki</h1>
			<div class="flex items-center w-full space-x-6 md:space-x-12">
				<div class="w-full h-2 border-t-2 border-b-2 border-brown-200"></div>
				<img src="../skins/zodiac/assets/images/orb.png" alt="Gnosis Guild orb" class="w-16">
				<div class="w-full h-2 border-t-2 border-b-2 border-brown-200"></div>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap items-center justify-between p-2">
		<div>

			<div class="inline-block ml-4 md:hidden">
				<button id="toggle-navigation" class="link">
					Menu
				</button>

				<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']); ?>">
					Home
				</a>
			</div>
		</div>
	</div>

	<div class="flex flex-col flex-grow">
		<div class="md:flex md:justify-center">
			<div class="flex-none w-full p-6 space-y-4 md:max-w-xs max-md:hidden" id="sidebar">
				<?php foreach ($this->getSidebar() as $boxName => $box) : ?>
					<div
						class="p-4 border-2 border-double shadow-2xl bg-brown-900 border-brown-500 bg-blur-12"
						id="<?php echo Sanitizer::escapeIdForAttribute($box['id']) ?>" <?php echo Linker::tooltip($box['id']) ?>
					>
						<h5 class="mt-0 font-mono mb-4"><?php echo htmlspecialchars($box['header']); ?></h5>
						<?php if (is_array($box['content'])) : ?>
							<ul class="text-xs sidebar-list">
								<?php foreach ($box['content'] as $key => $item) {
									echo $this->makeListItem($key, $item);
								} ?>
							</ul>
						<?php
					else :
						echo $box['content'];
					endif;
					?>
					</div>
				<?php endforeach; ?>

			</div>
			<div class="flex-1 p-6 xl:max-w-screen-lg">
				<div id="p-cactions">
					<div class="container flex items-center justify-between mx-auto mb-2">
						<ul class="flex flex-wrap items-center list-reset md:space-x-2 content-actions">
							<?php foreach ($this->data['content_actions'] as $key => $tab) {
								echo $this->makeListItem($key, $tab);
							} ?>
						</ul>
						<form action="<?php $this->text('wgScript'); ?>" class="inline-block mb-0 ml-2 w-64">
							<input type="hidden" name="title" value="<?php $this->text('searchtitle') ?>" />
							<?php echo $this->makeSearchInput(['id' => 'searchInput', 'class' => 'w-full']); ?>
						</form>
					</div>
				</div>
				<div class="container p-6 mx-auto border-2 border-double shadow-2xl max-md:px-6 border-brown-500 bg-brown-900 bg-opacity-80 bg-blur-12">

					<?php if ($this->data['newtalk']) : ?>
							<div class="line-usermessage">
								<?php $this->html('newtalk'); ?>
							</div>
						<?php endif; ?>

						<div id="sitenotice">
							<?php $this->html('sitenotice'); ?>
						</div>

						<div class="page-title">

							<?php echo $this->getIndicators(); ?>
							<h1 class="p-0 m-0 leading-none"><?php $this->html('title'); ?></h1>

							<?php if ($this->data['isarticle']) {
								echo '<div class="text-xs text-brown-500 mt-1">';
								$this->msg('tagline');
								echo '</div>';
							} ?>

							<?php $this->html('subtitle'); ?>
							<?php $this->html('undelete'); ?>
						</div>

					<div class="lg:flex flex-row-reverse">
						<!-- Info Box
						<div class="lg:w-64 lg:ml-6 info-box">
							<div class="bg-brown-900 border border-brown-500 p-4">
								<h3 class="mt-0">Exit Pattern</h3>
								<img src="/w/skins/zodiac/assets/images/exit-badge.png" alt="Exit Pattern" class="w-full object-center object-contain h-24 mt-4" />
								<div class="flex justify-between items-center mt-4 font-mono text-sm">
									Pattern
									<a href="#">
										Exit
									</a>
								</div>
								<div class="flex justify-between items-center mt-4 font-mono text-sm">
									Type
									<a href="#">
										Module
									</a>
								</div>
								<div class="flex justify-between items-center mt-4 font-mono text-sm">
									Repository
									<a href="#">
										Github
									</a>
								</div>
								<div class="flex justify-between items-center mt-4 font-mono text-sm">
									App
									<a href="#">
										Exit App
									</a>
								</div>
								<div class="border-t border-brown-500 pt-4 mt-4 text-xs text-brown-200">
									The Zodiac Exit Module allows members to redeem a designated token, including an NFT, for a proportional share of an avatar's (account's) digital assets, similar to Moloch DAO's rageQuit() function. Members can use the Exit App to redeem their tokens.
								</div>
							</div>
						</div> -->
						<div class="flex-1 mt-6 lg:mt-0">
							<div class="articlebody">
								<?php $this->html('bodytext'); ?>
							</div>
							<?php $this->html('dataAfterContent'); ?>
							<?php $this->html('catlinks'); ?>
						</div>
					</div>

				</div>

				<div class="footer">
					<div class="footer-icons">
							<?php foreach ($this->getZodiacFooterIcons() as $blockName => $footerIcons) : ?>
								<div>
									<?php foreach ($footerIcons as $icon) {
										echo $this->getSkin()->makeFooterIcon($icon);
									}  ?>
								</div>
							<?php endforeach; ?>
						</div>

						<?php foreach ($this->getFooterLinks() as $category => $links) : ?>
							<ul class="list-reset">
								<?php foreach ($links as $key) : ?>
									<li><?php $this->html($key) ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endforeach; ?>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php $this->printTrail(); ?>
	</body>

	</html><?php
	}
}
