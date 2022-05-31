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

	<div class="relative w-full px-2 md:px-6 pt-10 mx-auto mb-2">
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
				<img src="<?php echo $GLOBALS['wgResourceBasePath'] ?>/skins/zodiac/assets/images/orb.png" alt="Gnosis Guild orb" class="w-16">
				<div class="w-full h-2 border-t-2 border-b-2 border-brown-200"></div>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap items-center justify-between p-2">
		<div>

			<div class="inline-block mb-4 md:hidden">
				<button id="toggle-navigation" class="link">
					Menu
				</button>

				<a href="<?php echo htmlspecialchars($this->data['nav_urls']['mainpage']['href']); ?>">
					Home
				</a>
			</div>
		</div>
	</div>

	<div class="flex flex-col flex-grow px-2 mb-20 md:px-6">
		<div class="grid grid-cols-12 gap-6 lg:gap-12 mx-auto max-w-screen-xl">
			<div class="flex-none space-y-4 col-start-1 col-end-13 md:col-end-5 lg:col-end-4 max-md:hidden" id="sidebar">
				<?php foreach ($this->getSidebar() as $boxName => $box) : ?>
					<div
						class="p-4 border-2 border-double shadow-2xl bg-brown-900 border-brown-500 bg-blur-12"
						id="<?php echo Sanitizer::escapeIdForAttribute($box['id']) ?>" <?php echo Linker::tooltip($box['id']) ?>
					>
						<?php if($box['id'] === 'p-Patterns') : ?>
							<img class="w-8 h-8 mb-1" src="<?php echo $GLOBALS['wgResourceBasePath'] ?>/skins/zodiac/assets/images/patterns-orb.png" alt="Patterns Category orb" />
						<?php elseif($box['id'] === 'p-Library') : ?>
							<img class="w-8 h-8 mb-1" src="<?php echo $GLOBALS['wgResourceBasePath'] ?>/skins/zodiac/assets/images/library-orb.png" alt="Library Category orb" />
						<?php elseif($box['id'] === 'p-Documentation') : ?>
							<img class="w-8 h-8 mb-1" src="<?php echo $GLOBALS['wgResourceBasePath'] ?>/skins/zodiac/assets/images/documentation-orb.png" alt="Documentation Category orb" />
						<?php endif ?>
						<h5 class="mt-0 font-mono mb-4">
							<?php echo htmlspecialchars($box['header']); ?>
						</h5>
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
			<div class="flex-1 col-start-1 col-span-12 md:col-start-5 lg:col-start-4 md:col-span-9">
				<div id="p-cactions">
					<div class="container md:flex flex-end justify-between mx-auto mb-2">
						<ul class="flex flex-wrap content-end list-reset space-x-2 content-actions">
							<?php foreach ($this->data['content_actions'] as $key => $tab) {
								echo $this->makeListItem($key, $tab);
							} ?>
						</ul>
						<form action="<?php $this->text('wgScript'); ?>" class="inline-block mb-0 mt-2 md:mt-0 md:ml-2 w-full md:w-64">
							<input type="hidden" name="title" value="<?php $this->text('searchtitle') ?>" />
							<?php echo $this->makeSearchInput(['id' => 'searchInput', 'class' => 'w-full']); ?>
						</form>
					</div>
				</div>
				<div class="p-6 mx-auto border-2 border-double shadow-2xl border-brown-500 bg-brown-900 bg-opacity-80 bg-blur-12 main-content">

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
							<h1 class="p-0 m-0 leading-none">
								<?php echo str_replace(["Category:", "File:"], "", $this->data['title']); ?>
							</h1>

							<?php $this->html('undelete'); ?>
						</div>

					<div class="lg:flex flex-row-reverse">
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
